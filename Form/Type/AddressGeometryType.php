<?php

namespace Vlabs\GoogleMapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vlabs\GoogleMapBundle\Entity\AddressGeometry;
use Vlabs\GoogleMapBundle\Form\DataTransformer\ArrayToLatLngBoundsVOTransformer;

/**
 * Class AddressGeometryType
 * @package Vlabs\GoogleMapBundle\Form
 */
class AddressGeometryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location_type', TextType::class,[
                'property_path' => 'locationType'
            ])
            ->add('location', LatLngVOType::class)
            ->add('viewport', LatLngBoundsVOType::class)
            ->add('bounds', LatLngBoundsVOType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddressGeometry::class,
            'empty_data' => null
        ]);
    }
}