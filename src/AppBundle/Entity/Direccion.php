<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Direccion
 *
 * @ORM\Table(name="direccion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DireccionRepository")
 */
class Direccion
{

     /**
     * @var string
     * @ORM\Column(name="calle", type="string", length=50)
     * @ORM\Id
     */
    private $calle;


    /**
     * @var int
     * @ORM\Column(name="numero", type="smallint")
     * @ORM\Id
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ciudad", inversedBy="direcciones", cascade={"PERSIST"})
     * @ORM\JoinColumns(
     * 		@ORM\JoinColumn(name="ciudad_nombre", referencedColumnName="nombre"),
     * 		@ORM\JoinColumn(name="ciudad_codigoPostal",referencedColumnName="codigoPostal"))
     */
    private $ciudad; //@ORM\Id 

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lugar", mappedBy="direccion")
     */
    private $lugares;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Cliente", mappedBy="direccion")
     */
    private $clientes;




    //---------------------------------

    public function __construct()
    {
        $this->lugares = new ArrayCollection();
        $this->clientes = new ArrayCollection();
    }


    /**
     * @return ArrayCollection
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * @param ArrayCollection $clientes
     */
    public function setClientes($clientes)
    {
        $this->clientes = $clientes;
    }


    /**
     * @return ArrayCollection
     */
    public function getLugares()
    {
        return $this->lugares;
    }

    /**
     * @param ArrayCollection $lugares
     */
    public function setLugares(ArrayCollection $lugares)
    {
        $this->lugares = $lugares;
    }


    /**
     * @return Ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param Ciudad $ciudad
     */
    public function setCiudad(Ciudad $ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * Set calle
     *
     * @param string $calle
     *
     * @return Direccion
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Direccion
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    public function __toString()
    {
        return 'Direccion[' .  $this->getCalle() . ', ' . $this->getNumero() . $this->getCiudad()->__toString() . '] ';
    }


}

