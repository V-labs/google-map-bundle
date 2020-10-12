<?php

namespace Vlabs\GoogleMapBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface AddressComponentTypeInterface
 * @package Vlabs\GoogleMapBundle\Model
 */
interface AddressComponentTypeInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string|null $formatted
     *
     * @return AddressComponentTypeInterface
     */
    public function setName(?string $formatted): AddressComponentTypeInterface;

    /**
     * @return AddressComponentInterface
     */
    public function getAddressComponent();

    /**
     * @return AddressComponentInterface
     */
    public function setAddressComponent(?AddressComponentInterface $addressComponent): AddressComponentTypeInterface;

    /**
     * @return string|null
     */
    public function __toString(): ?string;
}