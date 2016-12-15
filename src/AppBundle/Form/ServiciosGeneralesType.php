<?php

namespace AppBundle\Form;

use AppBundle\Entity\ServiciosGenerales;
use AppBundle\Form\Publicidad;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ServiciosGeneralesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        parent::buildForm($builder, $options);
        
        $builder->add('nombre', TextType::class, array(
            'label' => 'Nombre',
            'required' => false,
        ));

        $builder->add('costo', MoneyType::class, array(
            'label' => 'Costo',
            'required' => false,
            'currency'=>'ARS',
        ));

        $builder->add('imageFile', VichImageType::class, array(
            'label' => 'Foto ilustrativa',
            'required' => false,
            'data_class'=>null,
        ));
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => ServiciosGenerales::class
        ]);
    }

	public function getPublicidadFormTypeClass(){
		return PublicidadServiciosGeneralesType::class;
	}

}
