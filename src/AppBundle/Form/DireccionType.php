<?php

namespace AppBundle\Form;

use AppBundle\Entity\Direccion;
use AppBundle\Entity\Ciudad;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;


class DireccionType extends AbstractDireccionType{
	
    public function buildForm(FormBuilderInterface $builder, array $options){
        parent::buildForm($builder, $options);
               
        $builder->add('nuevaCiudad', CheckboxType::class, array(
            'label' => 'Nueva Ciudad',
            'mapped' => false,
            'required' => false,
		));

		$formModifier = function (FormInterface $form, $nuevaCiudad = null) {
			dump($nuevaCiudad);
			
            if($nuevaCiudad===true){
				$form->add('ciudad', CiudadType::class, array(
					'required' => false,
				));
				
				$form->add('nuevaCiudad', CheckboxType::class, array(
					'label' => 'Nueva Ciudad',
					'mapped' => false,
					'disabled' => true,       
				));
				
           } else {
				$form->add('ciudad', EntityType::class, array(
					'label' => 'Ciudad cargados',
					'class' => Ciudad::class,
					'required' => false,
					'mapped' => true,
					'placeholder' => 'Ciudades cargadas',
					'data' => $nuevaCiudad,
				));
			}
        };
                
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();
                $formModifier($event->getForm(), $data);
            }
        );

        $builder->get('nuevaCiudad')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
				$checkBoxValue = $event->getForm()->getData();
				if($checkBoxValue === true)
					$formModifier($event->getForm()->getParent(), true);
            }
        );
    }


    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Direccion::class
        ]);
    }


}
