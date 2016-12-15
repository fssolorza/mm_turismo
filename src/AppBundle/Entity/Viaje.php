<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Publicidad\PublicidadViaje;

/**
 * Viaje
 *
 * @ORM\Table(name="viaje")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ViajeRepository")
 */
class Viaje extends Servicio
{

    /**
     * @var string
     * @ORM\Column(name="eslogan", type="string", length=255, nullable=true)
     */
    private $eslogan;
    

//-----------------------------------------
    /**
     * Set eslogan
     *
     * @param string $eslogan
     *
     * @return Viaje
     */
    public function setEslogan($eslogan)
    {
        $this->eslogan = $eslogan;

        return $this;
    }

    /**
     * Get eslogan
     *
     * @return string
     */
    public function getEslogan()
    {
        return $this->eslogan;
    }

    public function __toString()
    {
        return 'Viaje[' . parent::__toString() . ', ' . $this->getEslogan() . '] ';
    }
    
    
    public function newPublicidad(){
		return new PublicidadViaje($this);
	}
    
}

