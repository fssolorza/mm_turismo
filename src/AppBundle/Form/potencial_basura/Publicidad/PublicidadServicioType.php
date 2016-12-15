<?php


namespace AppBundle\Form\Publicidad;


use AppBundle\Entity\Servicio;
use AppBundle\Entity\Itinerario;
use AppBundle\Entity\Actividad;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

class PublicidadServicioType extends PublicidadServiciosGeneralesType{

    public function buildForm(FormBuilderInterface $builder, array $options){

        parent::buildForm($builder, $options);

        $builder->add('descripcion', TextType::class, array(
				'label' => 'Descripción',
				'required' => false,
			));


        $builder->add('origen', EntityType::class, array(
				'label' => 'Salida',
				'class' => Itinerario::class,
				'required' => false,
				'choice_label' => 'lugar',
			));
            
        
        $builder->add('actividades', EntityType::class, array(
            'class' => Actividad::class,
            'required' => false,
            'choice_label' => 'lugar',
        ));

    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Servicio::class
        ]);
    }

}
