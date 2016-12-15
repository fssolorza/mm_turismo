<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;


use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use AppBundle\Entity\Viaje;
use AppBundle\Entity\Itinerario;
use AppBundle\Entity\Lugar;
use AppBundle\Entity\BuscarViaje;

use AppBundle\Repository\ItinerarioRepository;
use AppBundle\Repository\ViajeRepository;

use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class BuscarViajeType extends AbstractType{
	
    public function buildForm(FormBuilderInterface $builder, array $options){
      
		parent::buildForm($builder, $options);
		/*
		 * Al principio el form se muestra con 5 selectboxes. Todos los selectboxes muestran instancias de Viaje que fueron cargados al sistema y por lo tanto estan en la base de datos.
		 * Los dos primeros lugar de origen y fecha (por fecha se entiende fecha y hora) corresponderian a la definicion de la instancia Itinerario que esta apuntada en viaje.origen.lugar y viaje.origen.fecha correspondientemente. Analogamente para los siguientes dos selectboxes con respecto a viaje.destino.lugar y viaje.destino.fecha. El ultimo selectbox tambien muestra instancias de viaje pero cuyos itinerarios origen y destino son los que el usuario <selecciono> lateralmente en los selectboxes anteriores.
		 * 
		 * Cuando el usuario selecciona un <lugar> del primer selectbox, para el sistema selecciona una instancia de Viaje. El buildForm toma el elemento con id viaje y lo analiza para mostrar en los restantes selectboxes solamente instancias de viaje que tengan como origen el lugar seleccionado. Asi los selectboxes muestran, a su turno, el dato relevemante de instancias de viaje.
		 * */
		
        $builder->add('lugarOrigen', EntityType::class, array(
			'label' => 'Lugar de salida',
			'class' => Viaje::class,
			'placeholder' => 'Primero elige un lugar de salida (origen)',
			'required' => false,
			'mapped' => false,
			'choice_label' => 'origen.lugar',
        ));
        
        //usar placeholder ayuda a entender el camino que toman los eventos 
		$builder->add('lugarOrigenFecha', EntityType::class, array(
			'class' => Viaje::class,
			'mapped' => false,
			'placeholder' => 'Antes de elegir la fecha, debes elegir el lugar de origen',
			'required' => false,
			'choice_label' => 'destino.fecha',
		));
		
		$builder->add('lugarDestino', EntityType::class, array(
			'class' => Viaje::class,
			'mapped' => false,
			'placeholder' => 'Antes de elegir el destino, debes elegir los datos de mas arriba',
			'required' => false,
			'choice_label' => 'destino.lugar',
		));

		$builder->add('lugarDestinoFecha', EntityType::class, array(
			'class' => Viaje::class,
			'mapped' => false,
			'placeholder' => 'Primero elige un destino',
			'required' => false,
			'choice_label' => 'destino.fecha',
		));

		$builder->add('viaje', EntityType::class, array(
			'class' => Viaje::class,
			'mapped' => false,
			'placeholder' => 'Viajes disponibles (se filtran a medida que seleccionas opciones de mas arriba)',
			'required' => false,
		));
		
		$formModifier = function (FormInterface $form, Viaje $viajeLugarOrigen = null) {
			/* 
			 * Los elementos que aqui se modifican solo tendran efecto
			 * si los mismos son utilizados para reemplazar a los "viejos" luego del POST
			 * realizado por ajax en buscarServicio.html.twig. Justamente estos nuevos elementos
			 * del form estan en la variable $html.
			 * 
			 * */
			 
            if(!($viajeLugarOrigen===null)){
				$lugarOrigen = $viajeLugarOrigen->getOrigen()->getLugar();
				
				$form->add('lugarOrigenFecha', EntityType::class, array(
					'class' => Viaje::class,
					'mapped' => false,
					'query_builder' => function(ViajeRepository $vr) use ($lugarOrigen){
							return $vr->findAllByOrigenLugar($lugarOrigen);
						},
					'placeholder' => 'Fecha de Viajes disponibles para el origen seleccionado',
					'required' => false,
					'choice_label' =>'origen.fecha',
				));
				
				$form->add('lugarDestino', EntityType::class, array(
					'class' => Viaje::class,
					'mapped' => false,
					'placeholder' => 'Antes de elegir el destino, debes elegir los datos de mas arriba',
					'required' => false,
					'query_builder' => function(ViajeRepository $vr) use ($lugarOrigen){
							return $vr->findAllByOrigenLugar($lugarOrigen);
						},
					'choice_label' => 'destino.lugar',
				));

				$form->add('lugarDestinoFecha', EntityType::class, array(
					'class' => Viaje::class,
					'mapped' => false,
					'placeholder' => 'Primero elige un destino',
					'required' => false,
					'query_builder' => function(ViajeRepository $vr) use ($lugarOrigen){
							return $vr->findAllByOrigenLugar($lugarOrigen);
						},					
					'choice_label' => 'destino.fecha',
				));
				
				
				$form->add('viaje', EntityType::class, array(
					'class' => Viaje::class,
					'mapped' => false,
					'query_builder' => function(ViajeRepository $vr) use ($lugarOrigen){
							return $vr->findAllByOrigenLugar($lugarOrigen);
						},
					'placeholder' => 'Viajes disponibles para los datos antes seleccionados',
					'required' => false,
				));
			}
			
		};

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $busarViaje = $event->getData();
                $formModifier($event->getForm(), $busarViaje->getViaje());
            }
        );

        $builder->get('lugarOrigen')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $lugarOrigen = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $lugarOrigen);
            }
        );
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        /*
         * Thanks to the data_class option, the form creates a new <<Genus>> object behind the scenes.
         * And then it sets the data on it.
         * */
        $resolver->setDefaults([
            'data_class' => BuscarViaje::class
        ]);
    }
}
