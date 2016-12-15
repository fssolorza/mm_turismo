<?php


namespace AppBundle\Entity\Publicidad;


use AppBundle\Entity\Servicio;
use AppBundle\Entity\ServiciosGenerales;
use AppBundle\Entity\Itinerario;
use AppBundle\Entity\Actividad;

abstract class PublicidadServicio extends PublicidadServiciosGenerales{

	public function descripcion(){
		$descripcionOrigen = $this->getServicioGeneral()->getOrigen()->__toString();
		$descripcionDestino = $this->getServicioGeneral()->getDestino()->__toString();
		return $this->getServicioGeneral()->getDescripcion() . 'Salida: ' . $descripcionOrigen . ' Destino ' . $descripcionDestino;
	}

}
