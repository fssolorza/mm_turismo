<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HotelRepository")
 */
class Hotel extends Lugar
{

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=30)
     */
    private $telefono;

    /**
     * @var int
     *
     * @ORM\Column(name="estrellas", type="smallint")
     */
    private $estrellas;


    //----------------------------

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Hotel
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set estrellas
     *
     * @param integer $estrellas
     *
     * @return Hotel
     */
    public function setEstrellas($estrellas)
    {
        $this->estrellas = $estrellas;

        return $this;
    }

    /**
     * Get estrellas
     *
     * @return int
     */
    public function getEstrellas()
    {
        return $this->estrellas;
    }

    public function __toString()
    {
        return '[' . parent::__toString() . ', ' . $this->getTelefono() . ', ' . $this->getEstrellas() . '] ';
    }

}

