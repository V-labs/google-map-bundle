<?php

namespace Vlabs\GoogleMapBundle\Entity;

/**
 * Class AbstractAddressComponent
 * @package Vlabs\GoogleMapBundle\Entity
 */
abstract class AbstractAddressComponent
{
    /**
     * @var AddressInterface|null
     */
    protected $address;

    /**
     * @var string|null
     */
    protected $longName;

    /**
     * @var string|null
     */
    protected $shortName;

    /**
     * @var string|null
     */
    protected $type;

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
     * @return AbstractAddressComponent
     */
    public function setAddress(?AddressInterface $address): AbstractAddressComponent
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLongName(): ?string
    {
        return $this->longName;
    }

    /**
     * @param string|null $longName
     *
     * @return AbstractAddressComponent
     */
    public function setLongName(?string $longName): AbstractAddressComponent
    {
        $this->longName = $longName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    /**
     * @param string|null $shortName
     *
     * @return AbstractAddressComponent
     */
    public function setShortName(?string $shortName): AbstractAddressComponent
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return AbstractAddressComponent
     */
    public function setType(?string $type): AbstractAddressComponent
    {
        $this->type = $type;
        return $this;
    }
}