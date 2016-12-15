<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class ServiciosGeneralesCarousel
{
    // utilizado para formar el carousel en sgIndex.html.twig

	/**
     * @var ArrayCollection
     */
    private $promociones;

	/**
     * @var ArrayCollection
     */
    private $viajes;
    
	/**
     * @var ArrayCollection
     */
    private $eventos;    
    
    public function __construct(){
		$this->promociones = new ArrayCollection();
		$this->viajes = new ArrayCollection();
		$this->eventos = new ArrayCollection();
		
	}
    
    
    public function getPromociones(){
		return $this->promociones;
	}

    public function getViajes(){
		return $this->viajes;
	}

    public function getEventos(){
		return $this->eventos;
	}
	
	public function setPromociones($promociones){
		$this->promociones = $promociones;
	}

    public function setViajes($viajes){
		$this->viajes = $viajes;
	}

    public function setEventos($eventos){
		$this->eventos = $eventos;
	}

}

