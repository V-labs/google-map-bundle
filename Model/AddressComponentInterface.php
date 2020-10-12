<?php

namespace Vlabs\GoogleMapBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Interface AddressComponentInterface
 * @package Vlabs\GoogleMapBundle\Model
 */
interface AddressComponentInterface
{
    /**
     * @return AddressInterface|null
     */
    public function getAddress(): ?AddressInterface;

    /**
     * @param AddressInterface|null $address
     *
     * @return AddressComponentInterface
     */
    public function setAddress(?AddressInterface $address): AddressComponentInterface;

    /**
     * @return string|null
     */
    public function getLongName(): ?string;

    /**
     * @param string|null $longName
     *
     * @return AddressComponentInterface
     */
    public function setLongName(?string $longName): AddressComponentInterface;

    /**
     * @return string|null
     */
    public function getShortName(): ?string;

    /**
     * @param string|null $shortName
     *
     * @return AddressComponentInterface
     */
    public function setShortName(?string $shortName): AddressComponentInterface;

    /**
     * @return Collection|AddressComponentTypeInterface[]
     */
    public function getAddressComponentTypes();

    /**
     * @return Collection|string[]
     */
    public function getTypes();

    /**
     * @param string $name
     *
     * @return AddressComponentInterface
     */
    public function addType(string $name): AddressComponentInterface;

    /**
     * @param string $name
     *
     * @return AbstractAddressComponent
     */
    public function removeType(string $name): AddressComponentInterface;

    /**
     * @param Collection|string[] $names
     */
    public function setTypes($names);
}