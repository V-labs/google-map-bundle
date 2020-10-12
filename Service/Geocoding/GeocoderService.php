<?php

namespace Vlabs\GoogleMapBundle\Service\Geocoding;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use function json_decode;
use Symfony\Component\Debug\Exception\ContextErrorException;
use Vlabs\GoogleMapBundle\Service\Geocoding\Exception\InvalidParameterException;
use Vlabs\GoogleMapBundle\Service\Geocoding\Exception\NoGeocodingFoundForAddressException;
use Vlabs\GoogleMapBundle\Service\Geocoding\Exception\UnableToParseGeocodingJsonReponseException;

/**
 * Class GeocoderService
 * @package Vlabs\GoogleMapBundle\Service\Geocoding
 */
class GeocoderService
{
    /**
     * @var string
     */
    private $googleApiKey;

    /**
     * @var string
     */
    private $geocoderBaseUrl;

    /**
     * GeocoderService constructor.
     * @param string $googleApiKey
     * @param string $geocoderBaseUrl
     */
    public function __construct($googleApiKey, $geocoderBaseUrl)
    {
        $this->googleApiKey     = $googleApiKey;
        $this->geocoderBaseUrl  = $geocoderBaseUrl;
    }

    /**
     * @param string $address
     * @return bool|mixed
     * @throws InvalidParameterException
     */
    public function geocode($address)
    {
        if(empty($this->googleApiKey)){
            throw new InvalidParameterException('You must provide the "google_api_key" parameter to use the Geocoder.');
        }

        if(empty($this->geocoderBaseUrl)){
            throw new InvalidParameterException('You must provide the "google_geocoder_base_url" parameter to use the Geocoder.');
        }

        // todo: Move to bundle conf
        $outputFormat   = 'json';
        $addressEncoded = urlencode($address);

        $client = new Client();

        /** @var Response $response */
        $response = $client->get(sprintf('%s%s?address=%s&key=%s',
            $this->geocoderBaseUrl,
            $outputFormat,
            $addressEncoded,
            $this->googleApiKey
        ));

        if($response->getStatusCode() == \Symfony\Component\HttpFoundation\Response::HTTP_OK)
        {
            $content = $response->getBody()->getContents();

            $data = \json_decode($content, true);

            if($data['status'] !== 'OK')
            {
                throw new NoGeocodingFoundForAddressException($data->status . ( isset($data->error_message) ? ': '. $data->error_message : '' ));
            }

            try{

                return $data;

            }catch(ContextErrorException $e)
            {
                throw new UnableToParseGeocodingJsonReponseException($e->getMessage());
            }
        }

        return false;
    }
}