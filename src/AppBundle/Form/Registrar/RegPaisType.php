<?php

namespace AppBundle\Form\Registrar;

use AppBundle\Entity\Registrar\RegPais;

use AppBundle\Entity\Pais;
use AppBundle\Entity\Ciudad;
use AppBundle\Repository\PaisRepository;

use AppBundle\Form\PaisType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class RegPaisType extends AbstractType
{
	/*
	 
	 Este form muestra un selectBox 'pais' con los paises actualmente cargados.
	 Si el usuario (que seria un empleado de MMTurismo) no encuentra el pais que busca, porque aun no ha sido cargado en la base de datos, entonces puede hacer click en el checkbox 'nuevoPais' y proceder a la carga del nuevo pais en la base de datos. En la rutina javascript correspondiente, este checkbox (cuyo id es regPais_nuevoPais) esta asociado a un evento de escucha que dispara un POST via ajax (views/registrar/regPais.html.twig) con el objetivo de cambiar el selectBox por PaisType::class que es el que permite la carga de un nuevo pais.
	 
	 Esto podria haberse incorporado directamente en PaisType.php pero entonces siempre que se lo quiera utilizar se estara llevando consigo funcionalidad descripta.
	 
	 */

    public function buildForm(FormBuilderInterface $builder, array $options){
		
       parent::buildForm($builder, $options);

	
		$builder->add('nuevoPais', CheckboxType::class, array(
            'label' => 'Nuevo Pais',
            'mapped' => false,
        ));

		$formModifier = function (FormInterface $form, $nuevoPais = null) {
			
            if($nuevoPais){
				$form->add('pais', PaisType::class, array(
					'label' => 'Nuevo Pais',
				));
			
				$form->add('nuevoPais', CheckboxType::class, array(
					'label' => 'Nuevo Pais',
					'mapped' => false,
					'disabled' => true,       
				));
				
           } else {
			   			   
				$form->add('pais', EntityType::class, array(
					'class' => Pais::class,
					'required' => false,
					'mapped' => true,
					'placeholder' => 'selecciona un pais',
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
                $formModifier($event->getForm()->getParent(), true);
            }
        );
        
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegPais::class
        ]);
    }

}
