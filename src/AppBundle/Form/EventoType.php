<?php


namespace AppBundle\Form;

use AppBundle\Form\Publicidad;


use Symfony\Component\Form\FormBuilderInterface;


class EventoType extends ServicioType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AppBundle\Entity\Evento',
        );
    }
    
    public function getPublicidadFormTypeClass(){
		return PublicidadEventoType::class;
	}
    
}
