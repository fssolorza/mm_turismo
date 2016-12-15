<?php


namespace AppBundle\Form\Publicidad;

use AppBundle\Form\Evento;

use Symfony\Component\Form\FormBuilderInterface;


class PublicidadEventoType extends PublicidadServicioType
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
