<?php

namespace Vlabs\GoogleMapBundle\Serializer\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use Vlabs\GoogleMapBundle\VO\LatLngBoundsVO;

/**
 * Class LatLngBoundsHandler
 * @package Vlabs\GoogleMapBundle\Serializer\Handler
 */
class LatLngBoundsHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format'    => 'json',
                'type'      => LatLngBoundsVO::class,
                'method'    => 'deserializeLatLngBoundsVOToJson',
            ],
        ];
    }

    /**
     * @param JsonSerializationVisitor $visitor
     * @param string                   $geometryString
     * @param array                    $type
     * @param Context                  $context
     * @return mixed
     */
    public function deserializeLatLngBoundsVOToJson(JsonDeserializationVisitor $visitor, array $latLngBounds, array $type, Context $context)
    {
        $south  = $latLngBounds['southwest']['lat'];
        $west   = $latLngBounds['southwest']['lng'];
        $north  = $latLngBounds['northeast']['lat'];
        $east   = $latLngBounds['northeast']['lng'];
        return new LatLngBoundsVO($south, $west, $north, $east);
    }
}