<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class HotelType extends LugarType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('telefono', TextType::class, array('label' => 'Telefono', 'required' => false));
        $builder->add('estrellas', IntegerType::class,
            array('label' => 'Estrellas', 'required' => false, 'data'=>'3'));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AppBundle\Entity\Hotel',
        );
    }

    public function getName()
    {
        return 'FormHotel';
    }
}
