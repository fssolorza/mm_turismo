<?php

namespace AppBundle\Form;

use AppBundle\Entity\Post;
use AppBundle\Entity\Sesion;
use AppBundle\Entity\Usuario;

use AppBundle\Entity\ServiciosGenerales;

use AppBundle\Repository\ServiciosGeneralesRepository;
use AppBundle\Repository\SesionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

use Vich\UploaderBundle\Form\Type\VichImageType;


class PostType extends AbstractType
{
	//dependency inyection: necesito el usuario actualmente logeado para poder filtrar los servicios generales que el cliente asociado a su usuario alguna vez contrato.
	
	private $usuario;
	
	function __construct(Usuario $user){
		$this->usuario = $user;
	}
	
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('servicioGeneral', EntityType::class, array(
			'label' => 'Ref servicio general',
			'required' => false,
			'class'=> ServiciosGenerales::class,
			'choice_label' => ''
		));
        
        $builder->add('sesion', EntityType::class, array(
			'class' => Sesion::class,
        ));
        
        $builder->add('titulo', TextType::class, array(
			'label' => 'Titulo',
			'required' => false
		));
        
        $builder->add('hora', TimeType::class, array(
			'label' => 'Hora',
			'required' => false,
			'disabled' => true,
			'input'=>'string',
		));	
		
		$builder->add('imageFile', VichImageType::class, array(
            'label' => 'Foto',
            'required' => false,
            'data_class'=>null,
        ));
        	
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Post::class
        ]);
    }

}
