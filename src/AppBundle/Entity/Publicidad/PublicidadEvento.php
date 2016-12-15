<?php


namespace AppBundle\Entity\Publicidad;



class PublicidadEvento extends PublicidadServicio{

	public function descripcion(){
		return parent::descripcion() . 'algo mas ';
	}
    
    
}
