<?php

namespace Vlabs\GoogleMapBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Vlabs\GoogleMapBundle\Entity\Address;

/**
 * Class AddressRepository
 * @package Vlabs\GoogleMapBundle\Repository
 */
class AddressRepository extends EntityRepository implements AddressRepositoryInterface
{
    /**
     * @param Address $address
     */
    public function save(Address $address)
    {
        $this->_em->persist($address);
        $this->_em->flush();
    }

}