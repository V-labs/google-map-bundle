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
            ->add('location_type', TextType::class,[
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

        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'onPreSubmit']);
    }

    public function onPreSubmit(FormEvent $event)
    {
        /** @var FormInterface $form */
        $form = $event->getForm();
        /** @var AddressGeometryInterface|null $data */
        $data = $event->getData();

        if($data instanceof AddressGeometryInterface){
            $location = $data->getLocation();
            if($location instanceof LatLngVO && $location->isEmpty()){
                $data->setLocation(null);
                $form->remove('location');
            }

            $bounds = $data->getBounds();
            if($bounds instanceof LatLngBoundsVO && $bounds->isEmpty()){
                $data->setBounds(null);
                $form->remove('bounds');
            }

            $viewport = $data->getViewport();
            if($viewport instanceof LatLngBoundsVO && $viewport->isEmpty()){
                $data->setViewport(null);
                $form->remove('viewport');
            }

            $event->setData($data);
        }
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