<?php

namespace AppBundle\Form;

use AppBundle\Repository\ClienteRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('username', TextType::class, array(
			'label' => 'Nombre de Usuario:',
			'required' => false,));
        
        $builder->add('password', TextType::class, array(
			'label' => 'Password',
			'required' => false,));

        $builder->add('fechaRegistro', DateTimeType::class, array(
			'label' => 'Fecha Registro',
			'disabled'=>true));

        
        $builder->add('mail', TextType::class, array(
			'label' => 'Mail',
			'required' => false,));


        $builder->add('cliente', EntityType::class, array(
            'class' => 'AppBundle:Cliente',
            'label' => 'Cliente',
        ));
    }
    

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AppBundle\Entity\Usuario',
        );
    }
}
