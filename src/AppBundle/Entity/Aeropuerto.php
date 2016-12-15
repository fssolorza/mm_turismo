<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aeropuerto
 *
 * @ORM\Table(name="aeropuerto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AeropuertoRepository")
 */
class Aeropuerto extends Lugar
{

    /**
     * @var string
     *
     * @ORM\Column(name="nivelSeguridad", type="string", length=10)
     */
    private $nivelSeguridad;


    //--------------------


    /**
     * @return string
     */
    public function getNivelSeguridad()
    {
        return $this->nivelSeguridad;
    }

    /**
     * @param string $nivelSeguridad
     */
    public function setNivelSeguridad($nivelSeguridad)
    {
        $this->nivelSeguridad = $nivelSeguridad;
    }

    public function __toString()
    {
        return 'Aeropuerto[' . parent::__toString() . ', ' . $this->getNivelSeguridad() . '] ';
    }

}

