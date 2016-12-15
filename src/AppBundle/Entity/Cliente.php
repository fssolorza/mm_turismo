<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClienteRepository")
 */

class Cliente
{
    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=10)
     * @ORM\Id
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=20)
     */
    private $apellido;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Direccion", cascade={"PERSIST"}, inversedBy="clientes")
     * @ORM\JoinColumns(
     * 	   @ORM\JoinColumn(name="direccion_calle", referencedColumnName="calle"),
     *     @ORM\JoinColumn(name="direccion_numero", referencedColumnName="numero"))
     */
    private $direccion;


    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Usuario", mappedBy="cliente", cascade={"PERSIST"})
     */
    private $usuario; //No es necesario especificar JoinColumn porque estamos usando la clave por defecto de Doctrine. Esto a su vez lo hacemos porque estamos usando FOSUserBundle.


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Contrato", mappedBy="cliente")
     */
    private $contratos;




//------------------------------------

    public function __construct()
    {
        $this->contratos = new ArrayCollection();
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Cliente
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
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
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return ArrayCollection
     */
    public function getContratos()
    {
        return $this->contratos;
    }

    /**
     * @param ArrayCollection $contratos
     */
    public function setContratos(ArrayCollection $contratos)
    {
        $this->contratos = $contratos;
    }


    /**
     * @return Usuario
     */
    public function getUsuarioReg()
    {
        return $this->usuario_reg;
    }

    /**
     * @param Usuario $usuario_reg
     */
    public function setUsuarioReg(Usuario $usuario_reg)
    {
        $this->usuario_reg = $usuario_reg;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cliente
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Cliente
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return 'Cliente['. $this->getDni() .', '. $this->getNombre() .' '. $this->getApellido() . '] ';
    }
}

