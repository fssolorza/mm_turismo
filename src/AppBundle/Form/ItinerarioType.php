<?php

namespace AppBundle\Form;

use AppBundle\Entity\Itinerario;
use AppBundle\Entity\Lugar;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ItinerarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('fecha', DateType::class, array(
            'label' => 'Fecha',
            'required' => true,
            'html5'=>true,
			'input'=>'string'));

        $builder->add('horaInicio', TimeType::class, array(
			'label' => 'Hora Inico',
			'required' => true,
			'html5' => true,
			'input'=>'string'));
            
        $builder->add('horaFin', TimeType::class, array(
			'label' => 'Hora Fin',
			'required' => true,
			'html5' => true,
			'input'=>'string'));

        $builder->add('lugar', EntityType::class, array(
			'class' => Lugar::class,
			'required' => true,
		));
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Itinerario::class
        ]);
    }

}
