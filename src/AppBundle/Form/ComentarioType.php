<?php


namespace AppBundle\Form;

use AppBundle\Entity\Comentario;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComentarioType extends PostType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('texto', TextType::class, array(
			'label' => 'Texto',
			'required' => false,
		));
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Comentario::class
        ]);
    }

}
