<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Ciudad;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pais
 * 
 * @ORM\Table(name="pais")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaisRepository")
 */
class Pais
{
    /**
     * @var string
     * @Assert\NotBlank(message = "El nombre de un pais forma parte de la calve primaria." )
     * @ORM\Column(name="nombre", type="string", length=50)
     * @ORM\Id
     */
    private $nombre;

    /**
     * @var string
     * @Assert\NotBlank(message = "La capital de un pais forma parte de la calve primaria.")
     * @ORM\Column(name="capital", type="string", length=50)
     * @ORM\Id
     */
    private $capital;

    /**
     * @var string
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ciudad", mappedBy="pais", cascade={"PERSIST"})
     */
    private $ciudades;



    //-------------------------------------------------

    public function __construct()
    {
        $this->ciudades = new ArrayCollection();
    }


    /**
     * @return ArrayCollection
     */
    public function getCiudades()
    {
        return $this->ciudades;
    }

    /**
     * @param ArrayCollection $ciudades
     */
    public function setCiudades(ArrayCollection $ciudades)
    {
        $this->ciudades = $ciudades;
    }


    public function addCiudad(Ciudad $ciudad)
    {
         $this->ciudades->add($ciudad);
         $ciudad->setPais($this);
    }

    public function removeCiudad(Ciudad $ciudades)
    {
        $this->ciudades = $ciudades;
    }


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Pais
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

    /**
     * Set capital
     *
     * @param string $capital
     *
     * @return Pais
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Pais
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }


    public function __toString()
    {
        return 'Pais['.$this->getNombre() . ' (' . $this->getCapital() . ')] ';
    }
}

