<?php

namespace Vlabs\GoogleMapBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class AbstractAddress
 * @package Vlabs\GoogleMapBundle\Model
 */
abstract class AbstractAddress
{
    /**
     * @var string|null
     */
    protected $placeId;

    /**
     * @var string|null
     */
    protected $formattedAddress;

    /**
     * @var array
     */
    protected $types;

    /**
     * @var Collection|AddressComponentInterface[]
     */
    protected $addressComponents;

    /**
     * @var AddressGeometryInterface|null
     */
    protected $geometry;

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
    public function getPlaceId(): ?string
    {
        return $this->placeId;
    }

    /**
     * @param string|null $placeId
     *
     * @return AddressInterface
     */
    public function setPlaceId(?string $placeId): AddressInterface
    {
        $this->placeId = $placeId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormattedAddress(): ?string
    {
        return $this->formattedAddress;
    }

    /**
     * @param string|null $formatted
     *
     * @return $this
     */
    public function setFormattedAddress(?string $formattedAddress): AddressInterface
    {
        $this->formattedAddress = $formattedAddress;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @param array|null $types
     *
     * @return AddressInterface
     */
    public function setTypes(?array $types): AddressInterface
    {
        $this->types = $types;

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
     * @return $this
     */
    public function setAddressComponents($addressComponents): AddressInterface
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
    public function addAddressComponent(AddressComponentInterface $addressComponent): AddressInterface
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
    public function removeAddressComponent(AddressComponentInterface $addressComponent): AddressInterface
    {
        $addressComponent->setAddress(null);
        $this->addressComponents->removeElement($addressComponent);
        return $this;
    }

    /**
     * @return AddressGeometryInterface|null
     */
    public function getGeometry(): ?AddressGeometryInterface
    {
        return $this->geometry;
    }

    /**
     * @param AddressGeometryInterface|null $geometry
     *
     * @return AddressInterface
     */
    public function setGeometry(?AddressGeometryInterface $geometry): AddressInterface
    {
        $geometry->setAddress($this);
        $this->geometry = $geometry;

        return $this;
    }
}