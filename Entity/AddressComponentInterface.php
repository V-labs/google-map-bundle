<?php

namespace Vlabs\GoogleMapBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface AddressComponentInterface
 * @package Vlabs\GoogleMapBundle\Entity
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
     * @return string|null
     */
    public function getType(): ?string;

    /**
     * @param string|null $type
     *
     * @return AddressComponentInterface
     */
    public function setType(?string $type): AddressComponentInterface;
}