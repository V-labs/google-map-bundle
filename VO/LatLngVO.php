<?php


namespace Vlabs\GoogleMapBundle\VO;

/**
 * Class LatLngVO
 * @package Vlabs\GoogleMapBundle\VO
 */
class LatLngVO
{
    /**
     * @var string|null
     */
    private $lat;

    /**
     * @var string|null
     */
    private $lng;

    /**
     * LatLngVO constructor.
     * @param ?string $lat
     * @param ?string $lng
     */
    public function __construct(?string $lat, ?string $lng)
    {
        $this->lat = is_null($lat) ? null : $lat;
        $this->lng = is_null($lng) ? null : $lng;
    }

    /**
     * @return string|null
     */
    public function getLat(): ?string
    {
        return $this->lat;
    }

    /**
     * @return string|null
     */
    public function getLng(): ?string
    {
        return $this->lng;
    }
}