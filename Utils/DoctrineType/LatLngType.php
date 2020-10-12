<?php

namespace Vlabs\GoogleMapBundle\Utils\DoctrineType;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Vlabs\GoogleMapBundle\VlabsGoogleMapBundle;
use Vlabs\GoogleMapBundle\VO\LatLngVO;

/**
 * Class LatLngType
 * @package Vlabs\VlabsGoogleMapBundle\Utils\DoctrineType
 * @see https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/cookbook/advanced-field-value-conversion-using-custom-mapping-types.html
 */
class LatLngType extends Type
{
    const NAME = 'lat_lng';

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
        list($latitude, $longitude) = sscanf($value, '%f %f');

        return new LatLngVO($latitude, $longitude);
    }

    /**
     * {@inheritDoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof LatLngVO) {
            $value = sprintf('%F %F', $value->getLat(), $value->getLng());
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