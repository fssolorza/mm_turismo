<?php

namespace AppBundle\Entity;

use Doctrine\DBAL\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Itinerario
 *
 * @ORM\Table(name="itinerario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItinerarioRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="itinerarioType", type="string")
 * @ORM\DiscriminatorMap({"itinerario" = "Itinerario", "actividad"="Actividad"})
 */
class Itinerario{
    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="fecha", type="string")
     * @ORM\Id
     */
    private $fecha;

    /**
     * @var \Time
     * 
     * @ORM\Column(name="horaInicio", type="string")
     * @ORM\Id
     */
    private $horaInicio;

    /**
     * @var \Time
     * 
     * @ORM\Column(name="horaFin", type="string")
     * @ORM\Id
     */
    private $horaFin;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lugar", inversedBy="itinerarios", cascade={"PERSIST"})
     * @ORM\JoinColumn(name="lugar_nombre", referencedColumnName="nombre")
     */
    private $lugar; //deberia estar como Id pero si lo agrego da error. UndefinedIndex lugar


	/**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Servicio", mappedBy="origen")
	 */
	private $serviciosOrigen;

	/**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Servicio", mappedBy="destino")
 	 */
	private $serviciosDestino;



    //---------------
    
    
    public function __construct(){
		
		$this->serviciosOrigen = new ArrayCollection();
		$this->serviciosDestino = new ArrayCollection();		
	}
    
    /**
     * @return ArrayCollection
     */
     
    public function getServiciosOrigen(){
        return $this->serviciosOrigen;
    }

    /**
     * @param ArrayCollection
     */
    public function setServiciosOrigen($serviciosOrigen)
    {
        $this->serviciosOrigen = $serviciosOrigen;
    }

    /**
     * @return ArrayCollection
     */
    public function getServiciosDestino()
    {
        return $this->serviciosDestino;
    }

    /**
     * @param ArrayCollection
     */
    public function setServiciosDestino($serviciosDestino)
    {
        $this->serviciosDestino = $serviciosDestino;
    }


    /**
     * @return \Time
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaInicio
     * 
     * @param \Time $horaInicio
     * 
     * @return Itinerario
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    /**
     * Get horaFin
     * 
     * @return \Time
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set horaFin
     * 
     * @param \Time $horaFin
     * 
     * @return Itinerario
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }

    /**
     * Set fecha
     *
     * @param \Date $fecha
     *
     * @return Itinerario
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     * 
     * @return \Date
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return Lugar
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * @param Lugar $lugar
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
    }

    public function __toString()
    {
		//$this->getFecha() . $this->getHoraInicio() . $this->getHoraFin() .
		return 'Itinerario['.  $this->getLugar()->__toString() . ']';
			
    }
}

