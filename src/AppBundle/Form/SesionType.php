<?php

namespace AppBundle\Form;


use AppBundle\Repository\UsuarioRepository;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class SesionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('fecha', DateType::class, array(
			'label' => 'Fecha (ejm: 21-3-2012) ',
			'required'=>false,
            'input' => 'string',          
			));
        $builder->add('usuario', EntityType::class, array(
            'class' => 'AppBundle:Usuario',
            'choice_label' => 'username',
        ));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AppBundle\Entity\Sesion',
        );
    }

}
