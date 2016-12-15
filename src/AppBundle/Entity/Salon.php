<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salon
 *
 * @ORM\Table(name="salon")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalonRepository")
 */
class Salon extends Lugar
{

    /**
     * @var int
     *
     * @ORM\Column(name="capacidad", type="smallint")
     */
    private $capacidad;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="decimal", precision=7, scale=2)
     */
    private $precio;

    /**
     * Set capacidad
     *
     * @param integer $capacidad
     *
     * @return Salon
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return int
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Salon
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }


    public function __toString()
    {
        return 'Salon['. parent::__toString() . ', ' . $this->getPrecio() . ', ' . $this->getCapacidad() . ']';
    }

}

