<?php

namespace Vlabs\GoogleMapBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface AddressInterface
 * @package Vlabs\GoogleMapBundle\Entity
 */
interface AddressInterface
{
    /**
     * @return string|null
     */
    public function getFormatted(): ?string;

    /**
     * @param string|null $formatted
     *
     * @return AddressInterface
     */
    public function setFormatted(?string $formatted): AddressInterface;

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

}