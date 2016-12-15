<?php

namespace AppBundle\Form;

use AppBundle\Entity\Actividad;
use AppBundle\Entity\Tag;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ActividadType extends ItinerarioType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        parent::buildForm($builder, $options);
        
        $builder->add('tag', EntityType::class, array(
			'label' => 'Nombre de la actividad (check in, take off, cena, etc)',
			'class' => Tag::class,
        ));
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Actividad::class
        ]);
    }

}
