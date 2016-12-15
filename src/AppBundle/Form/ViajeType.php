<?php

namespace AppBundle\Form;


use AppBundle\Entity\Viaje;
use AppBundle\Form\Publicidad\PublicidadViajeType;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ViajeType extends ServicioType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('eslogan', TextType::class, array(
			'label' => 'Slogan', 
			'required' => false));

    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Viaje::class
        ]);
    }

    public function getPublicidadFormTypeClass(){
		return PublicidadViajeType::class;
	}    
    
    
}
