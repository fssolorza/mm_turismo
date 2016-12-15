<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class FotoType extends PostType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('descripcion', TextType::class, array(
			'label' => 'Descripcion',
			'required' => false,
		));
		
        $builder->add('peso', TextType::class, array(
			'label' => 'Peso',
			'required' => false,
		));
        

    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AppBundle\Entity\Foto',
        );
    }


}
