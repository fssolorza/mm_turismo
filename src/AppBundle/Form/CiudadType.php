<?php

namespace AppBundle\Form;

use AppBundle\Form\AbstractCiudadType;

use AppBundle\Entity\Pais;
use AppBundle\Entity\Ciudad;

use AppBundle\Form\PaisType;

use AppBundle\Repository\PaisRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class CiudadType extends AbstractCiudadType{

    public function buildForm(FormBuilderInterface $builder, array $options){
		
		parent::buildForm($builder, $options);
		              
       $builder->add('nuevoPais', CheckboxType::class, array(
            'label' => 'Nuevo Pais',
            'mapped' => false,
            'required' => false,
        ));

		$formModifier = function (FormInterface $form, $nuevoPais = null) {
			dump($nuevoPais);
            if($nuevoPais===true){
				$form->add('pais', PaisType::class, array(
					'required' => false,
				));
				
				$form->add('nuevoPais', CheckboxType::class, array(
					'label' => 'Nuevo Pais',
					'mapped' => false,
					'disabled' => true,       
				));
           } else {
				$form->add('pais', EntityType::class, array(
					'label' => 'Pais cargados',
					'class' => Pais::class,
					'required' => false,
					'mapped' => true,
					'placeholder' => 'Paises cargados',
					'data' => $nuevoPais,
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

        $builder->get('nuevoPais')->addEventListener(
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
            'data_class' => Ciudad::class
        ]);
    }

}
