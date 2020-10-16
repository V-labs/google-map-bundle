<?php

namespace Vlabs\GoogleMapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vlabs\GoogleMapBundle\Entity\AddressGeometry;
use Vlabs\GoogleMapBundle\Form\DataTransformer\ArrayToLatLngBoundsVOTransformer;
use Vlabs\GoogleMapBundle\Model\AddressGeometryInterface;
use Vlabs\GoogleMapBundle\VO\LatLngBoundsVO;
use Vlabs\GoogleMapBundle\VO\LatLngVO;

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
            ->add('location_type', TextType::class, [
                'property_path' => 'locationType',
                'required'      => true
            ])
            ->add('location', LatLngVOType::class, [
                'required' => true
            ])
            ->add('viewport', LatLngBoundsVOType::class, [
                'required' => false
            ])
            ->add('bounds', LatLngBoundsVOType::class, [
                'required' => false
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddressGeometry::class
        ]);
    }
}