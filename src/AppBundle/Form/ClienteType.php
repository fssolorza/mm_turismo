<?php

namespace AppBundle\Form;

use AppBundle\Entity\Direccion;
use AppBundle\Entity\Cliente;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('dni', TextType::class, array(
			'label' =>'DNI',
			'required' => false,
		));
        
        $builder->add('nombre', TextType::class, array(
			'label' => 'Nombre',
			'required' => false,
		));
        
        $builder->add('apellido', TextType::class, array(
			'label' => 'Apellido',
			'required' => false,
		));
        
        $builder->add('direccion', EntityType::class, array(
			'class' => Direccion::class,
			'required' => false,));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cliente::class,
        ]);
    }

}
