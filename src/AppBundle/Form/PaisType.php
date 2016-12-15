<?php

namespace AppBundle\Form;

use AppBundle\Entity\Pais;
use AppBundle\Entity\Ciudad;
use AppBundle\Repository\PaisRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PaisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('nombre', TextType::class, array(
			'label' => 'Nombre',
			'required' => false,
			'data' => 'Argentina',));
			
        $builder->add('capital', TextType::class, array(
			'label' => 'Capital',
			'required' => false,));
        
        $builder->add('descripcion', TextType::class, array(
			'label' => 'Descripción',
			'required' => false));

        $builder->add('buscar', SubmitType::class, array(
			'label' => 'Buscar'));
		        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pais::class
        ]);
    }

}
