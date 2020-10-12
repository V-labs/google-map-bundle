<?php

namespace Vlabs\GoogleMapBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface AddressableInterface
 * @package Vlabs\GoogleMapBundle\Model
 */
interface AddressableInterface
{
    /**
     * @return AddressInterface|null
     */
    public function getAddress(): ?AddressInterface;

    /**
     * @param AddressInterface|null $address
     * @return self
     */
    public function setAddress(?AddressInterface $address);

}