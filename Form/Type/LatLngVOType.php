<?php

namespace Vlabs\GoogleMapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vlabs\GoogleMapBundle\VO\LatLngVO;

/**
 * Class LatLngVOType
 * @package Vlabs\GoogleMapBundle\Form\Type
 */
class LatLngVOType extends AbstractType implements DataMapperInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('lat', NumberType::class, [
                'empty_data' => null,
                'scale'      => 7,
                'required'   => true
            ])
            ->add('lng', NumberType::class, [
                'empty_data' => null,
                'scale'      => 7,
                'required'   => true
            ])
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
            return null;
        }

        if(!$data instanceof LatLngVO){
            throw new UnexpectedTypeException($data, LatLngVO::class);
        }

        $forms = iterator_to_array($forms);
        $forms['lat']->setData($data->getLat());
        $forms['lng']->setData($data->getLng());
    }

    /**
     * @param $forms
     * @param $data
     */
    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new LatLngVO(
            $forms['lat']->getData(),
            $forms['lng']->getData()
        );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LatLngVO::class,
            'empty_data' => null
        ]);
    }
}