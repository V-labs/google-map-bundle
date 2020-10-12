<?php

namespace Vlabs\GoogleMapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vlabs\GoogleMapBundle\VO\LatLngBoundsVO;
use Vlabs\GoogleMapBundle\VO\LatLngVO;

/**
 * Class LatLngBoundsVOType
 * @package Vlabs\GoogleMapBundle\Form\Type
 */
class LatLngBoundsVOType extends AbstractType implements DataMapperInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('south', TextType::class)
            ->add('west', TextType::class)
            ->add('north', TextType::class)
            ->add('east', TextType::class)
        ;

        $builder->setDataMapper($this);
    }

    /**
     * @param $data
     * @param $forms
     */
    public function mapDataToForms($data, $forms)
    {
        if (null === $data) {
            return;
        }

        if(!$data instanceof LatLngBoundsVO){
            throw new UnexpectedTypeException($data, LatLngBoundsVO::class);
        }

        $forms = iterator_to_array($forms);
        $forms['south']->setData($data->getSouth());
        $forms['west']->setData($data->getWest());
        $forms['north']->setData($data->getNorth());
        $forms['east']->setData($data->getEast());
    }

    /**
     * @param $forms
     * @param $data
     */
    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new LatLngBoundsVO(
            $forms['south']->getData(),
            $forms['west']->getData(),
            $forms['north']->getData(),
            $forms['east']->getData()
        );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LatLngBoundsVO::class,
            'empty_data' => null
        ]);
    }
}