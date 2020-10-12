<?php

namespace Vlabs\GoogleMapBundle\Model;

use Vlabs\GoogleMapBundle\VO\LatLngBoundsVO;
use Vlabs\GoogleMapBundle\VO\LatLngVO;

/**
 * Interface AddressGeometryInterface
 * @package Vlabs\GoogleMapBundle\Model
 */
interface AddressGeometryInterface
{
    /**
     * @return AddressInterface|null
     */
    public function getAddress(): ?AddressInterface;

    /**
     * @param AddressInterface|null $latLng
     *
     * @return AddressGeometryInterface
     */
    public function setAddress(?AddressInterface $address): AddressGeometryInterface;

    /**
     * @return string|null
     */
    public function getLocationType(): ?string;

    /**
     * @param string|null $locationType
     *
     * @return AddressGeometryInterface
     */
    public function setLocationType(?string $locationType): AddressGeometryInterface;

    /**
     * @return LatLngVO|null
     */
    public function getLocation(): ?LatLngVO;

    /**
     * @param LatLngVO|null $latLng
     *
     * @return AddressGeometryInterface
     */
    public function setLocation(?LatLngVO $location): AddressGeometryInterface;

    /**
     * @return LatLngBoundsVO|null
     */
    public function getViewport(): ?LatLngBoundsVO;

    /**
     * @param LatLngBoundsVO|null $viewport
     *
     * @return AddressGeometryInterface
     */
    public function setViewport(?LatLngBoundsVO $viewport): AddressGeometryInterface;

    /**
     * @return LatLngBoundsVO|null
     */
    public function getBounds(): ?LatLngBoundsVO;

    /**
     * @param LatLngBoundsVO|null $bounds
     *
     * @return AddressGeometryInterface
     */
    public function setBounds(?LatLngBoundsVO $bounds): AddressGeometryInterface;

}