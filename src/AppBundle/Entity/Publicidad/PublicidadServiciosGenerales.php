<?php

namespace AppBundle\Entity\Publicidad;

use AppBundle\Entity\ServiciosGenerales;

abstract class PublicidadServiciosGenerales{
	
	private $targetServicioGeneral;
	
	
	public function __construct(ServiciosGenerales $sg){
		$this->targetServicioGeneral = $sg;
	}
	
	public function nombre(){
		return $this->targetServicioGeneral->getNombre() . ' ';
	}

	public function descripcion(){
		return ' ';
	}
	
	
	public function getServicioGeneral(){
		return $this->targetServicioGeneral;
	}


}
