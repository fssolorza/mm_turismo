<?php

namespace AppBundle\Form;

use AppBundle\Entity\Lugar;
use AppBundle\Entity\Direccion;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LugarType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        parent::buildForm($builder, $options);
        
        $builder->add('nombre', TextType::class, array(
			'label' => 'Nombre', 
			'required' => false,
		));
        
        $builder->add('direccion', EntityType::class, array(
			'required'=>false,
			'class' => Direccion::class,
			
		));
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Lugar::class
        ]);
    }

}
