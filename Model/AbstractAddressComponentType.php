<?php

namespace Vlabs\GoogleMapBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class AbstractAddressComponentType
 * @package Vlabs\GoogleMapBundle\Model
 */
abstract class AbstractAddressComponentType
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var AddressComponentInterface|null
     */
    protected $addressComponent;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return AddressComponentTypeInterface
     */
    public function setName(?string $name): AddressComponentTypeInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return AddressComponentInterface|null
     */
    public function getAddressComponent(): ?AddressComponentInterface
    {
        return $this->addressComponent;
    }

    /**
     * @param AddressComponentInterface|null $addressComponent
     *
     * @return AddressComponentTypeInterface
     */
    public function setAddressComponent(?AddressComponentInterface $addressComponent): AddressComponentTypeInterface
    {
        $this->addressComponent = $addressComponent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function __toString(): ?string
    {
        return $this->name;
    }
}