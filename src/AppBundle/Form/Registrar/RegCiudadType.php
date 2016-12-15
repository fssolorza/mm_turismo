<?php

namespace AppBundle\Form\Registrar;

use AppBundle\Entity\Registrar\RegPais;
use AppBundle\Entity\Registrar\RegCiudad;

use AppBundle\Form\AbstractCiudadType;

use AppBundle\Entity\Pais;
use AppBundle\Entity\Ciudad;
use AppBundle\Repository\PaisRepository;

use AppBundle\Form\PaisType;
use AppBundle\Form\CiudadType;

use AppBundle\Form\Registrar\RegPaisType;

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


class RegCiudadType extends AbstractCiudadType{
    public function buildForm(FormBuilderInterface $builder, array $options){

       parent::buildForm($builder, $options);
       
       $builder->add('pais', RegPaisType::class, array(
            'label' => 'Nuevo Pais',
            'mapped' => true,
            'data_class' => Pais::class,
		));        
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Ciudad::class
        ]);
    }

}
