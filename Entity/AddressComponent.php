<?php

namespace Vlabs\GoogleMapBundle\Entity;

use Vlabs\GoogleMapBundle\Model\AbstractAddressComponent;
use Vlabs\GoogleMapBundle\Model\AddressComponentInterface;

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