<?php

namespace Vlabs\GoogleMapBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Vlabs\GoogleMapBundle\Entity\Address;

/**
 * Interface AddressRepositoryInterface
 * @package Vlabs\GoogleMapBundle\Repository
 */
interface AddressRepositoryInterface
{
    /**
     * @param Address $address
     * @return mixed
     */
    public function save(Address $address);
}