<?php

namespace AppBundle\Form;


use AppBundle\Repository\ComentarioRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('comentario', ComentarioType::class));
    }
    
        public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => BlogType::class
        ]);
    }
    
}
