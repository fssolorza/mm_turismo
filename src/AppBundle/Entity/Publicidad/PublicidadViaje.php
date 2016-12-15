<?php

namespace AppBundle\Entity\Publicidad;

use AppBundle\Entity\Viaje;

class PublicidadViaje extends PublicidadServicio{

	public function descripcion(){
		return parent::descripcion() . 'algo mas sobre el viaje';
	}

}
