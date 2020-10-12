<?php

namespace Vlabs\GoogleMapBundle\Model;
use function array_diff;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Vlabs\GoogleMapBundle\Entity\AddressComponentType;

/**
 * Class AbstractAddressComponent
 * @package Vlabs\GoogleMapBundle\Model
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
     * @var Collection|AddressComponentTypeInterface[]
     */
    protected $addressComponentTypes;

    /**
     * AbstractAddressComponent constructor.
     */
    public function __construct()
    {
        $this->addressComponentTypes = new ArrayCollection();
    }

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
     * @return $this
     */
    public function setAddress(?AddressInterface $address): AddressComponentInterface
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
     * @return $this
     */
    public function setLongName(?string $longName): AddressComponentInterface
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
     * @return $this
     */
    public function setShortName(?string $shortName): AddressComponentInterface
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return Collection|AddressComponentTypeInterface[]
     */
    public function getAddressComponentTypes()
    {
        //For jms serializer who doesn't call constructor
        if(is_null($this->addressComponentTypes)){
            $this->addressComponentTypes = new ArrayCollection();
        }

        return $this->addressComponentTypes;
    }

    /**
     * @return Collection|string[]
     */
    public function getTypes()
    {
        return $this->getAddressComponentTypes()->map(function(AddressComponentTypeInterface $addressComponentType){
            return $addressComponentType->getName();
        });
    }

    /**
     * @param string $name
     *
     * @return AddressComponentInterface
     */
    public function addType(string $name): AddressComponentInterface
    {
        $criteria = Criteria::create()->andWhere(Criteria::expr()->eq('name', $name));

        /** @var Collection|AddressComponentTypeInterface[] $matching */
        $matching = $this->getAddressComponentTypes()->matching($criteria);

        if($matching->count() === 0){
            $addressComponentType = new AddressComponentType();
            $addressComponentType->setAddressComponent($this);
            $addressComponentType->setName($name);
            $this->addressComponentTypes->add($addressComponentType);
        }

        return $this;
    }

    /**
     * @param string $name
     *
     * @return AbstractAddressComponent
     */
    public function removeType(string $name): AddressComponentInterface
    {
        $criteria = Criteria::create()->andWhere(Criteria::expr()->eq('name', $name));

        /** @var Collection|AddressComponentTypeInterface[] $matching */
        $matching = $this->getAddressComponentTypes()->matching($criteria);

        foreach($matching as $addressComponentType){
            $this->addressComponentTypes->removeElement($addressComponentType);
        }

        return $this;
    }

    /**
     * @param Collection|string[] $names
     */
    public function setTypes($names)
    {
        $currentNames = $this->getTypes();

        foreach(array_diff($currentNames->toArray(), $names->toArray()) as $removed){
            $this->removeType($removed);
        }

        foreach(array_diff($names->toArray(), $currentNames->toArray()) as $added){
            $this->addType($added);
        }

        return $this;
    }
}