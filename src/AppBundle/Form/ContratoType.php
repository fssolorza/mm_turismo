<?php

namespace AppBundle\Form;


use AppBundle\Repository\ClienteRepository;
use AppBundle\Repository\ServiciosGeneralesRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Entity\Contrato;
use AppBundle\Entity\ServiciosGenerales;
use AppBundle\Entity\Cliente;


class ContratoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('fecha', DateTimeType::class, array(
			'label' => 'Fecha',
			'required' => false,
			'input' => 'string',
		));
        $builder->add('costo', MoneyType::class,
            array('label' => 'Costo', 'required' => true, 'currency'=>'ARS'));
        
        $builder->add('formaPago', TextType::class,
            array('label' => 'Forma de Pago', 'required' => false, 'data'=>'efectivo'));

        $builder->add('servicioGeneral', EntityType::class, array(
            'required'=>true,
            'class' => ServiciosGenerales::class,
            'label' => 'Servicios General',
        ));

        $builder->add('cliente', EntityType::class, array(
            'required'=>true,
            'class' => Cliente::class,
           ));
        
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => Contrato::class,
        );
    }

    public function getName()
    {
        return 'FormContrato';
    }

}
