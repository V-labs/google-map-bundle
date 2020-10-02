<?php

namespace Vlabs\GoogleMapBundle\Entity;

/**
 * Class AddressComponent
 * @package Vlabs\GoogleMapBundle\Entity
 */
class AddressComponent extends AbstractAddressComponent implements AddressComponentInterface
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}