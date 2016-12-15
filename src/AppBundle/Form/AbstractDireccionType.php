<?php

namespace AppBundle\Form;

use AppBundle\Entity\Direccion;
use AppBundle\Entity\Ciudad;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AbstractDireccionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        parent::buildForm($builder, $options);
        
        $builder->add('calle', TextType::class, array(
			'label' => 'Calle',
			'required' => false,));
			
        $builder->add('numero', IntegerType::class, array(
			'label' => 'Número',
			'required' => false,));
    }

}
