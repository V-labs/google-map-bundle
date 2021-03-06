<?php

namespace Vlabs\GoogleMapBundle\Form\Type;

use function is_null;
use function iterator_to_array;
use RecursiveIterator;
use function sprintf;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vlabs\GoogleMapBundle\DataTransformer\ArrayToLatLngBoundsTransformer;
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
            ->add('south', NumberType::class,[
                'scale'      => 7,
                'required'   => true
            ])
            ->add('west', NumberType::class,[
                'scale'      => 7,
                'required'   => true
            ])
            ->add('north', NumberType::class,[
                'scale'      => 7,
                'required'   => true
            ])
            ->add('east', NumberType::class,[
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
        $forms = iterator_to_array($forms);

        if (null === $data) {
            return;
        }

        if(!$data instanceof LatLngBoundsVO){
            throw new UnexpectedTypeException($data, LatLngBoundsVO::class);
        }

        if($data->isEmpty()) return;

        $forms['south']->setData($data->getSouth());
        $forms['west']->setData($data->getWest());
        $forms['north']->setData($data->getNorth());
        $forms['east']->setData($data->getEast());
    }

    /**
     * @param RecursiveIterator $forms
     * @param LatLngBoundsVO|null $data
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
        
        if($data->isEmpty()) $data = null;
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