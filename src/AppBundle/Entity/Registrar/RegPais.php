<?php

namespace AppBundle\Entity\Registrar;

use AppBundle\Entity\Pais;

class RegPais
{
	private $pais;
	
	public function setPais(Pais $pais){
		$this->pais = $pais;
	}

	public function getPais(){
		return $this->pais;
	}

}

