<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Servicio
 *
 * @ORM\Table(name="servicio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServicioRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"evento" = "Evento", "viaje"="Viaje"})
 */
  
abstract class Servicio extends ServiciosGenerales
{
    /**
     * @var string
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Itinerario", inversedBy="serviciosOrigen", cascade={"PERSIST"})
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="itinerario_origen_fecha", referencedColumnName="fecha"),
     *     @ORM\JoinColumn(name="itinerario_origen_horaInicio", referencedColumnName="horaInicio"),
     *     @ORM\JoinColumn(name="itinerario_origen_horaFin",referencedColumnName="horaFin"))
     */
    private $origen; //seria el take off =>  22/05/2017 11:00-13:00

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Itinerario", inversedBy="serviciosDestino", cascade={"PERSIST"})
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="itinerario_destino_fecha", referencedColumnName="fecha"),
     *     @ORM\JoinColumn(name="itinerario_destino_horaInicio", referencedColumnName="horaInicio"),
     *     @ORM\JoinColumn(name="itinerario_destino_horaFin",referencedColumnName="horaFin"))
     */
    private $destino; //arrival => 22/05/2017 22:00-23:00

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Actividad", inversedBy="servicios", cascade={"PERSIST"})
     * @ORM\JoinTable(
     * 		name="servicios_actividades",
     * 		joinColumns={@ORM\JoinColumn(name="servicio_nombre", referencedColumnName="nombre")},
	 * 		inverseJoinColumns={
     *     		@ORM\JoinColumn(name="actividad_nombre", referencedColumnName="fecha"),
     *     		@ORM\JoinColumn(name="actividad_horaInicio", referencedColumnName="horaInicio"),
	 *     		@ORM\JoinColumn(name="actividad_horaFin",referencedColumnName="horaFin")})
     */
	private $actividades;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Promocion", mappedBy="servicio")
     */
	private $promociones;


    //-------------------------



    public function __construct(){
        parent::__construct();

        $this-> promociones = new ArrayCollection();
        $this-> actividades = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getActividades(){
        return $this->actividades;
    }

    /**
     * @param ArrayCollection $actividades
     */
    public function setActividades(ArrayCollection $actividades)
    {
        $this->actividades = $actividades;
    }

    /**
     * @param Actividad $actividad
     */
    public function addActividad(Actividad $actividad){
        $this->actividades->add($actividad);
    }

    /**
     * @param Actividad $actividad
     */
    public function removeActividad(Actividad $actividad){
        $this->actividades->remove($actividad);
    }


    /**
     * @return Itinerario
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * @param Itinerario $origen
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;
    }

    /**
     * @return Itinerario
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * @param Itinerario $destino
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }


    /**
     * @return ArrayCollection
     */
    public function getPromociones()
    {
        return $this->promociones;
    }

    /**
     * @param ArrayCollection $promociones
     */
    public function setPromociones(ArrayCollection $promociones)
    {
        $this->promociones = $promociones;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Servicio
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
        return 'Servicio['. parent::__toString() . ', ' . $this->getDescripcion() . '] ';
    }

}

