<?php


namespace AppBundle\Form;


use AppBundle\Entity\Servicio;
use AppBundle\Entity\Itinerario;
use AppBundle\Form\Publicidad;


use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServicioType extends ServiciosGeneralesType{

    public function buildForm(FormBuilderInterface $builder, array $options){

        parent::buildForm($builder, $options);

        $builder->add('descripcion', TextType::class,
            array('label' => 'Descripción', 'required' => false));


        $builder->add('origen', ItinerarioType::class,
            array('label' => 'Datos de Salida', 'required' => false));
            
            
        $builder->add('destino', ItinerarioType::class,
            array('label' => 'Datos del destino', 'required' => false));
        
        $builder->add('actividades', CollectionType::class, array(
            'entry_type' => ActividadType::class,
            'required' => false,
            'allow_add'     => true,
            'by_reference' => false,
        ));

    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Servicio::class
        ]);
    }

	public function getPublicidadFormTypeClass(){
		return PublicidadServicioType::class;
	}

}
