<?php


namespace AppBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AeropuertoType extends LugarType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('nivelSeguridad', TextType::class,
            array('label' => 'Nivel de Seguridad', 'required' => false, 'data'=>'bueno'));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AppBundle\Entity\Aeropuerto',
        );
    }
}
