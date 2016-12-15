<?php

namespace AppBundle\Entity\Publicidad;

use AppBundle\Entity\Promocion;
use AppBundle\Entity\Viaje;

class PublicidadPromocion extends PublicidadServiciosGenerales{
	
	
	public function descripcion(){
		
		$pre = 'Contratando el servicio tienes 10% de descuento.';
		$pos = '.';
		$disp = $this->getServicioGeneral()->getDisponibles();

		if(!($disp===null)){
			$pos = ' Solo quedan dispobibles ' . $disp;
		}
				
		return parent::descripcion() . $pre . $this->getServicioGeneral()->getServicio()->getNombre() . $pos;
	}
    
}
