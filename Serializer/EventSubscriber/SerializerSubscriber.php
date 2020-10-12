<?php

namespace Vlabs\GoogleMapBundle\Serializer\EventSubscriber;

use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use Vlabs\GoogleMapBundle\Entity\Address;
use Vlabs\GoogleMapBundle\Entity\AddressComponent;
use Vlabs\GoogleMapBundle\Entity\AddressGeometry;
use Vlabs\GoogleMapBundle\Model\AbstractAddress;
use Vlabs\GoogleMapBundle\Model\AbstractAddressComponent;
use Vlabs\GoogleMapBundle\Model\AbstractAddressGeometry;

/**
 * Class SerializerSubscriber
 * @package Vlabs\GoogleMapBundle\Serializer\EventSubscriber
 */
class SerializerSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            [
                'event'  => Events::PRE_DESERIALIZE,
                'method' => 'onPreDeserialize'
            ]
        ];
    }

    public function onPreDeserialize(PreDeserializeEvent $event): void
    {
        $type = $event->getType();

        switch($type['name']){
            case AbstractAddress::class :
                $event->setType(Address::class, $type['params']);
                break;
            case AbstractAddressComponent::class :
                $event->setType(AddressComponent::class, $type['params']);
                break;
            case AbstractAddressGeometry::class :
                $event->setType(AddressGeometry::class, $type['params']);
                break;
            default:
                //continue
        }
    }
}