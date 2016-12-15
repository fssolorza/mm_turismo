<?php

namespace AppBundle\Entity\Registrar;

use AppBundle\Entity\Ciudad;

class RegCiudad
{
	private $ciudad;
	
	public function setCiudad(Ciudad $ciudad){
		$this->ciudad = $ciudad;
	}

	public function getCiudad(){
		return $this->ciudad;
	}

}

