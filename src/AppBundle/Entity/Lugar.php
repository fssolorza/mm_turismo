<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lugar
 *
 * @ORM\Table(name="lugar")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LugarRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"lugar" = "Lugar", "aeropuerto"="Aeropuerto", "hotel" = "Hotel", "salon"="Salon"})
 */
class Lugar
{

    /**
     * @var string
     * @ORM\Column(name="nombre", type="string", length=100)
     * @ORM\Id
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Direccion", inversedBy="lugares", cascade={"PERSIST"})
     * @ORM\JoinColumns(
     * 	   @ORM\JoinColumn(name="direccion_calle", referencedColumnName="calle"),
     *     @ORM\JoinColumn(name="direccion_numero", referencedColumnName="numero"))
     */
    private $direccion;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Itinerario", mappedBy="lugar")
     */
    private $itinerarios;
    
    //---------------------------

    public function __construct()
    {
        $this->itinerarios = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getItinerarios()
    {
        return $this->itinerarios;
    }

    /**
     * @param ArrayCollection $itinerarios
     */
    public function setItinerarios($itinerarios)
    {
        $this->itinerarios = $itinerarios;
    }


    /**
     * @return Direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param Direccion $direccion
     */
    public function setDireccion(Direccion $direccion)
    {
        $this->direccion = $direccion;
    }


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Lugar
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function __toString()
    {
        return 'Lugar['. $this->getNombre() . ', ' . $this->getDireccion() . '] ';
    }

}

