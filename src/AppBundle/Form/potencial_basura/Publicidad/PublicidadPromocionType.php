<?php


namespace AppBundle\Form\Publicidad;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

use AppBundle\Entity\Promocion;
use AppBundle\Entity\Servicio;
use AppBundle\Form\Publicidad;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PublicidadPromocionType extends PublicidadServiciosGeneralesType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('disponibles', IntegerType::class, array(
			'label' => 'Cantidad Disponibles',
			'required' => false,
		));
        
        $builder->add('servicio', EntityType::class, array(
			'label' => 'Servicio afectado',
            'required' => false,
            'class' => Servicio::class,
			));
        

    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => Promocion::class,
        );
    }
    
	public function getPublicidadFormTypeClass(){
		return PublicidadPromocionType::class;
	}
    
}
