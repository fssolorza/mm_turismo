<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Publicidad\PublicidadEvento;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evento
 *
 * @ORM\Table(name="evento")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventoRepository")
 */
class Evento extends Servicio
{
    // Evento modela acontocimientos que no son viajes ni promociones.
    //Por ejemplo un casamiento, cumpleanos, festejos, etc.

    public function __toString()
    {
        return 'Evento[' . parent::__toString() . ']';
    }
    
    public function newPublicidad(){
		return new PublicidadEvento($this);
	}

}



