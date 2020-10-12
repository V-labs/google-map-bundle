<?php

namespace Vlabs\GoogleMapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vlabs\GoogleMapBundle\Entity\AddressComponent;

/**
 * Class AddressComponentType
 * @package Vlabs\GoogleMapBundle\Form
 */
class AddressComponentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('long_name', TextType::class, [
                'property_path' => 'longName'
            ])
            ->add('short_name', TextType::class, [
                'property_path' => 'shortName'
            ])
            ->add('types', CollectionType::class, [
                'entry_type'   => TextType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false
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
            'data_class'         => AddressComponent::class,
            'method'             => 'POST'
        ]);
    }
}