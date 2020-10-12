<?php

namespace Vlabs\GoogleMapBundle\Validator\Constraints;

use const __CLASS__;
use function sprintf;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\MissingOptionsException;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class Distinct extends Constraint
{
    public $message = 'This collection should contain only distinct elements.';

    public function getRequiredOptions()
    {
        return ['fields'];
    }

    public function getDefaultOption()
    {
        return 'fields';
    }
}