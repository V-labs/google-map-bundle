<?php

namespace Vlabs\GoogleMapBundle\Entity;

/**
 * Class Address
 * @package Vlabs\GoogleMapBundle\Entity
 */
class Address extends AbstractAddress implements AddressInterface
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