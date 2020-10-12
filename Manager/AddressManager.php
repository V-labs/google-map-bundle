<?php
namespace Vlabs\GoogleMapBundle\Manager;

use Vlabs\GoogleMapBundle\Entity\Address;
use Vlabs\GoogleMapBundle\Repository\AddressRepositoryInterface;

/**
 * Class AddressManager
 * @package Vlabs\GoogleMapBundle\Manager
 */
class AddressManager
{
    /**
     * @var AddressRepositoryInterface
     */
    protected $repository;

    /**
     * PlantManager constructor.
     * @param PlantRepository $plantRepository
     * @param PaginatorInterface $paginator
     */
    public function __construct(AddressRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Address $address
     */
    public function save(Address $address)
    {
        $this->repository->save($address);

    }
}