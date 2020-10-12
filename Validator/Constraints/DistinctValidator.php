<?php

namespace Vlabs\GoogleMapBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Class DistinctValidator
 * @package Vlabs\GoogleMapBundle\Validator\Constraints
 */
class DistinctValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Distinct) {
            throw new UnexpectedTypeException($constraint, Distinct::class);
        }

        if (null === $value) {
            return;
        }

        if (!\is_array($value) && !$value instanceof \Traversable) {
            throw new UnexpectedValueException($value, 'array|\Traversable');
        }

        $collectionElements = [];
        foreach ($value as $element) {
            if (\in_array($element, $collectionElements, true)) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', $this->formatValue($value))
                    ->addViolation();

                return;
            }
            $collectionElements[] = $element;
        }
    }
}
