<?php
/**
 * Created by PhpStorm.
 * User: ocean_soul
 * Date: 04/07/16
 * Time: 10:39
 */

namespace AppBundle\Form;

use Doctrine\DBAL\Types\DecimalType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;

class SalonType extends LugarType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('capacidad', IntegerType::class, array('label' => 'Capacidad', 'required' => false));
        $builder->add('precio', MoneyType::class, array('label' => 'Precio', 'required' => false, 'currency'=>'ARS'));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AppBundle\Entity\Salon',
        );
    }

    public function getName()
    {
        return 'FormSalon';
    }
}