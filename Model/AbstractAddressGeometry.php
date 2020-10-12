<?php

namespace Vlabs\GoogleMapBundle\Model;

use Vlabs\GoogleMapBundle\VO\LatLngBoundsVO;
use Vlabs\GoogleMapBundle\VO\LatLngVO;

/**
 * Class AbstractAddressGeometry
 * @package Vlabs\GoogleMapBundle\Model
 */
abstract class AbstractAddressGeometry
{
    /**
     * @var AddressInterface
     */
    protected $address;

    /**
     * @var string|null
     */
    protected $locationType;

    /**
     * @var LatLngVO|null
     */
    protected $location;

    /**
     * @var LatLngBoundsVO|null
     */
    protected $viewport;

    /**
     * @var LatLngBoundsVO|null
     */
    protected $bounds;

    /**
     * @return AddressInterface|null
     */
    public function getAddress(): ?AddressInterface
    {
        return $this->address;
    }

    /**
     * @param AddressInterface|null $address
     *
     * @return AddressGeometryInterface
     */
    public function setAddress(?AddressInterface $address): AddressGeometryInterface
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocationType(): ?string
    {
        return $this->locationType;
    }

    /**
     * @param string|null $locationType
     *
     * @return AddressGeometryInterface
     */
    public function setLocationType(?string $locationType): AddressGeometryInterface
    {
        $this->locationType = $locationType;
        return $this;
    }

    /**
     * @return LatLngVO|null
     */
    public function getLocation(): ?LatLngVO
    {
        return $this->location;
    }

    /**
     * @param LatLngVO|null $location
     *
     * @return AddressGeometryInterface
     */
    public function setLocation(?LatLngVO $location): AddressGeometryInterface
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return LatLngBoundsVO|null
     */
    public function getViewport(): ?LatLngBoundsVO
    {
        return $this->viewport;
    }

    /**
     * @param LatLngBoundsVO|null $viewport
     *
     * @return AddressGeometryInterface
     */
    public function setViewport(?LatLngBoundsVO $viewport): AddressGeometryInterface
    {
        $this->viewport = $viewport;
        return $this;
    }

    /**
     * @return LatLngBoundsVO|null
     */
    public function getBounds(): ?LatLngBoundsVO
    {
        return $this->bounds;
    }

    /**
     * @param LatLngBoundsVO|null $bounds
     *
     * @return AddressGeometryInterface
     */
    public function setBounds(?LatLngBoundsVO $bounds): AddressGeometryInterface
    {
        $this->bounds = $bounds;
        return $this;
    }
}