<?php

namespace Vlabs\GoogleMapBundle\Entity;

use Vlabs\GoogleMapBundle\Model\AbstractAddress;
use Vlabs\GoogleMapBundle\Model\AddressInterface;

/**
 * Class DeprecatedAddress
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