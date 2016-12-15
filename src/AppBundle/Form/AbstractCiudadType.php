<?php

namespace AppBundle\Form;

use AppBundle\Entity\Ciudad;
use AppBundle\Entity\Pais;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormInterface;


abstract class AbstractCiudadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		parent::buildForm($builder, $options);
        
        $builder->add('nombre', TextType::class, array(
			'label' => 'Nombre',
			'required' => false,
		));
        
        $builder->add('codigoPostal', TextType::class, array(
			'label' => 'Código Postal',
			'required' => false,
		));
        /*
        $builder->add('pais', EntityType::class, array(
			'label' => 'Pais cargados',
			'class' => Pais::class,
			'required' => true,
			'mapped' => true,
		));*/
    }

}
