<?php
namespace Vlabs\GoogleMapBundle\Manager;

use Vlabs\GoogleMapBundle\Entity\Address;
use Vlabs\GoogleMapBundle\Repository\AddressRepositoryInterface;

/**
 * Interface AddressManagerInterface
 * @package Vlabs\GoogleMapBundle\Manager
 */
interface AddressManagerInterface
{
    /**
     * AddressManagerInterface constructor.
     * @param AddressRepositoryInterface $repository
     */
    public function __construct(AddressRepositoryInterface $repository);

    /**
     * @param Address $address
     */
    public function save(Address $address);
}