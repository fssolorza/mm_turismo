<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Contrato
 *
 * @ORM\Table(name="contrato")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContratoRepository")
 */
class Contrato
{

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="string")
     * @ORM\Id
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cliente", inversedBy="contratos", cascade={"PERSIST"})
     * @ORM\JoinColumn(name="cliente_dni", referencedColumnName="dni")
     * @ORM\Id
     */
    private $cliente;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ServiciosGenerales", cascade={"PERSIST"})
     * @ORM\JoinColumn(referencedColumnName="nombre")
     */
    private $servicioGeneral;


    /**
     * @var float
     *
     * @ORM\Column(name="costo", type="decimal", precision=2, scale=2, nullable=false)
     */
    private $costo;

    /**
     * @var string
     *
     * @ORM\Column(name="formaPago", type="string", length=50)
     */
    private $formaPago;

    
    
    
    //-------------------------------------------------------------------
    
    
    /**
     * @return ServiciosGenerales
     */
    public function getServicioGeneral()
    {
        return $this->servicioGeneral;
    }

    /**
     * @param ServiciosGenerales $servicioGeneral
     */
    public function setServicioGeneral(ServiciosGenerales $servicioGeneral)
    {
        $this->servicioGeneral = $servicioGeneral;
    }

    /**
     * @return Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }


    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return \DateTime
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set costo
     *
     * @param float $costo
     *
     * @return Contrato
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return float
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set formaPago
     *
     * @param string $formaPago
     *
     * @return Contrato
     */
    public function setFormaPago($formaPago)
    {
        $this->formaPago = $formaPago;

        return $this;
    }

    /**
     * Get formaPago
     *
     * @return string
     */
    public function getFormaPago()
    {
        return $this->formaPago;
    }


    public function __toString()
    {
        return $this->getFecha() . ', ' .
        $this->getFormaPago() . ' , ' . $this->getCosto() .
        ', ' . $this->getCliente()->__toString() . ', ' . $this->getServicioGeneral()->__toString();
    }


}

