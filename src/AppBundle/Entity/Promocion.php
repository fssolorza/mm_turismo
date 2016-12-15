<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Publicidad\PublicidadPromocion;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promocion
 *
 * @ORM\Table(name="promocion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromocionRepository")
 */
class Promocion extends ServiciosGenerales
{
    /**
     * @var int
     *
     * @ORM\Column(name="disponibles", type="smallint")
     */
    private $disponibles;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Servicio", inversedBy="promociones")
     * @ORM\JoinColumn(name="servicio_nombre", referencedColumnName="nombre")
     */
    private $servicio;



    //----------------------------------------------------


    /**
     * @return Servicio
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * @param Servicio $servicio
     */
    public function setServicio(Servicio $servicio)
    {
        $this->servicio = $servicio;
    }


    /**
     * Set disponibles
     *
     * @param integer $disponibles
     *
     * @return Promocion
     */
    public function setDisponibles($disponibles)
    {
        $this->disponibles = $disponibles;

        return $this;
    }

    /**
     * Get disponibles
     *
     * @return int
     */
    public function getDisponibles()
    {
        return $this->disponibles;
    }


    public function __toString()
    {
        $servicioStr = '';
        if(!is_null($this->getServicio()))
            $servicioStr = $this->getServicio()->__toString();

        return 'Promocion[' . parent::__toString() . ', ' . $this->getDisponibles() . ', ' . $servicioStr . '] ';
    }


	public function newPublicidad(){
		return new PublicidadPromocion($this);
	}

}

