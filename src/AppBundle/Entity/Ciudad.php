<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ciudad
 *
 * @ORM\Table(name="ciudad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CiudadRepository")
 */
class Ciudad
{
    /**
     * @var string
     * @ORM\Column(name="nombre", type="string", length=50)
     * @ORM\Id
     */
    private $nombre;

    /**
     * @var string
     * @ORM\Column(name="codigoPostal", type="string", length=20)
     * @ORM\Id
     */
    private $codigoPostal;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pais", inversedBy="ciudades", cascade={"PERSIST"})
	 * @ORM\JoinColumns(
	 * 		@ORM\JoinColumn(name="pais_nombre", referencedColumnName="nombre", nullable=false), 
	 * 		@ORM\JoinColumn(name="pais_capital", referencedColumnName="capital", nullable=false))
	 */
    private $pais; 

	 
    /*como la relacion es ManyToOne es mandatorio especificar @JoinColumns. 
     * Sino dara el  sgt error
     * Column name `id` referenced for relation from AppBundle\Entity\Ciudad towards AppBundle\Entity\Pais does not exist.
     * Especificar JoinColumns permite a Doctrine generar la clave foranea pais_id*/

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Direccion", mappedBy="ciudad")
     */
    private $direcciones;






    //------------------------------------------

    public function __construct()
    {
        $this->direcciones=new ArrayCollection();
    }



    /**
     * @return Pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param Pais $pais
     */
    public function setPais(Pais $pais)
    {
        $this->pais = $pais;
    }


    /**
     * @return ArrayCollection
     */
    public function getDirecciones()
    {
        return $this->direcciones;
    }

    /**
     * @param ArrayCollection $direcciones
     */
    public function setDirecciones(ArrayCollection $direcciones)
    {
        $this->direcciones = $direcciones;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Ciudad
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
     * Set codigoPostal
     *
     * @param string $codigoPostal
     *
     * @return Ciudad
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    public function __toString()
    {
        return 'Ciudad['. $this->getNombre() . ', ' . $this->getPais()->__toString() . '] ';
    }
}

