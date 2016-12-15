<?php

namespace AppBundle\Form\Mostrar;

use AppBundle\Entity\Viaje;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormInterface;

class ShowViajeType extends AbstractType
{
/*
La idea es que este form solamente sea usada para mostrar los datos relativos a un viaje sin posibilidad de modificacion en ninguno de los atributos. Como muestra datos de un viaje en particular se supone que este form deberia estar escuchando al evento PreSetData.
Este FORM DEBE SER MODIFICADO ESTA COPIADO DE OTRO LADO SOLAMENTE.
*/
	
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
		$formModifier = function (FormInterface $form, $nuevoPais = null) {
		
			if($nuevoPais===true){
				$builder->add('nombre', TextType::class, array(
					'label' => 'Nombre del Viaje',
					'required' => false,
				));
					
				$builder->add('costo', MoneyType::class, array(
					'label' => 'Costo del Viaje',
					'required' => false,
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


    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Viaje::class
        ]);
    }
}
