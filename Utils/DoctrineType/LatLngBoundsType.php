<?php

namespace Vlabs\GoogleMapBundle\Utils\DoctrineType;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Vlabs\GoogleMapBundle\VlabsGoogleMapBundle;
use Vlabs\GoogleMapBundle\VO\LatLngVO;
use Vlabs\GoogleMapBundle\VO\LatLngBoundsVO;

/**
 * Class LatLngBoundsType
 * @package Vlabs\VlabsGoogleMapBundle\Utils\DoctrineType
 * @see https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/cookbook/advanced-field-value-conversion-using-custom-mapping-types.html
 */
class LatLngBoundsType extends Type
{
    const NAME = 'lat_lng_bounds';

    /**
     * {@inheritDoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'VARCHAR(255)';
    }

    /**
     * {@inheritDoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if(is_null($value)) return null;
        list($south, $west, $north, $east) = sscanf($value, '%f %f %f %f');

        return new LatLngBoundsVO($south, $west, $north, $east);
    }

    /**
     * {@inheritDoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof LatLngBoundsVO) {
            $value = sprintf('%F %F %F %F', $value->getSouth(), $value->getWest(), $value->getNorth(), $value->getEast());
        }

        return $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }
}