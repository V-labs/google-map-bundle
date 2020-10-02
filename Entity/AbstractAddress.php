<?php

namespace Vlabs\GoogleMapBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractAddress
 * @package Vlabs\GoogleMapBundle\Entity
 */
abstract class AbstractAddress
{
    /**
     * @var string|null
     */
    protected $formatted;

    /**
     * @var ArrayCollection|AddressComponentInterface[]
     */
    protected $addressComponents;

    /**
     * AbstractAddress constructor.
     */
    public function __construct()
    {
        $this->addressComponents = new ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getFormatted(): ?string
    {
        return $this->formatted;
    }

    /**
     * @param string|null $formatted
     *
     * @return AbstractAddress
     */
    public function setFormatted(?string $formatted): AbstractAddress
    {
        $this->formatted = $formatted;
        return $this;
    }

    /**
     * @return ArrayCollection|AddressComponentInterface[]
     */
    public function getAddressComponents()
    {
        return $this->addressComponents;
    }

    /**
     * @param ArrayCollection|AddressComponentInterface[] $addressComponents
     *
     * @return AbstractAddress
     */
    public function setAddressComponents($addressComponents)
    {
        foreach($addressComponents as $addressComponent){
            $addressComponent->setAddress($this);
        }

        $this->addressComponents = $addressComponents;
        return $this;
    }

    /**
     * @param AddressComponentInterface $addressComponent
     *
     * @return $this
     */
    public function addAddressComponent(AddressComponentInterface $addressComponent): AbstractAddress
    {
        $addressComponent->setAddress($this);
        $this->addressComponents->add($addressComponent);
        return $this;
    }

    /**
     * @param AddressComponentInterface $addressComponent
     *
     * @return $this
     */
    public function removeAddressComponent(AddressComponentInterface $addressComponent): AbstractAddress
    {
        $addressComponent->setAddress(null);
        $this->addressComponents->removeElement($addressComponent);
        return $this;
    }
}