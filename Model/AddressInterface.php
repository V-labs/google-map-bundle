<?php

namespace Vlabs\GoogleMapBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface AddressInterface
 * @package Vlabs\GoogleMapBundle\Model
 */
interface AddressInterface
{
    /**
     * @return string|null
     */
    public function getPlaceId(): ?string;

    /**
     * @param string|null $placeId
     *
     * @return AddressInterface
     */
    public function setPlaceId(?string $placeId): AddressInterface;

    /**
     * @return string|null
     */
    public function getFormattedAddress(): ?string;

    /**
     * @param string|null $formatted
     *
     * @return AddressInterface
     */
    public function setFormattedAddress(?string $formatted): AddressInterface;

    /**
     * @return array|null
     */
    public function getTypes(): ?array;

    /**
     * @param array|null $types
     *
     * @return AddressInterface
     */
    public function setTypes(?array $types): AddressInterface;

    /**
     * @return ArrayCollection|AddressComponentInterface[]
     */
    public function getAddressComponents();

    /**
     * @param ArrayCollection|AddressComponentInterface[] $addressComponents
     *
     * @return AddressInterface
     */
    public function setAddressComponents($addressComponents): AddressInterface;

    /**
     * @param AddressComponentInterface $addressComponent
     *
     * @return AddressInterface
     */
    public function addAddressComponent(AddressComponentInterface $addressComponent): AddressInterface;

    /**
     * @param AddressComponentInterface $addressComponent
     *
     * @return AddressInterface
     */
    public function removeAddressComponent(AddressComponentInterface $addressComponent): AddressInterface;

    /**
     * @return AddressGeometryInterface
     */
    public function getGeometry(): ?AddressGeometryInterface;

    /**
     * @param AddressGeometryInterface|null $geometryVO
     *
     * @return AddressInterface
     */
    public function setGeometry(?AddressGeometryInterface $geometryVO): AddressInterface;

}