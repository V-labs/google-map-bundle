<?php

namespace Vlabs\GoogleMapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vlabs\GoogleMapBundle\Entity\Address;

/**
 * Class AddressType
 * @package Vlabs\GoogleMapBundle\Form
 */
class AddressType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('formatted_address', TextType::class,[
                'property_path' => 'formattedAddress',
                'required'      => true
            ])
            ->add('address_components', CollectionType::class, [
                'entry_type'    => AddressComponentType::class,
                'property_path' => 'addressComponents',
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
                'required'      => true
            ])
            ->add('place_id', TextType::class,[
                'property_path' => 'placeId',
                'required'      => true
            ])
            ->add('types', CollectionType::class,[
                'entry_type'    => TextType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => true,
                'required'      => true
            ])
            ->add('geometry', AddressGeometryType::class,[
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
            'csrf_protection'    => false,
            'data_class'         => Address::class,
            'method'             => 'POST'
        ]);
    }
}