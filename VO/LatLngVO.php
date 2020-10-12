<?php


namespace Vlabs\GoogleMapBundle\VO;

/**
 * Class LatLngVO
 * @package Vlabs\GoogleMapBundle\VO
 */
class LatLngVO
{
    /**
     * @var float|null
     */
    private $lat;

    /**
     * @var float|null
     */
    private $lng;

    /**
     * LatLngVO constructor.
     * @param ?string $lat
     * @param ?string $lng
     */
    public function __construct(?string $lat, ?string $lng)
    {
        $this->lat = is_null($lat) ? null : (float)$lat;
        $this->lng = is_null($lng) ? null : (float)$lng;
    }

    /**
     * @return float|null
     */
    public function getLat(): ?float
    {
        return $this->lat;
    }

    /**
     * @return float|null
     */
    public function getLng(): ?float
    {
        return $this->lng;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return (
            is_null($this->lat)
            && is_null($this->lng)
        );
    }
}