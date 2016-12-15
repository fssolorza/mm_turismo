<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Actividad
 *
 * @ORM\Table(name="actividad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActividadRepository")
 */
class Actividad extends Itinerario
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tag", inversedBy="actividades", cascade={"PERSIST"})
     * @ORM\JoinColumn(name="tag_tipo", referencedColumnName="tipo")
     */
    private $tag; //por ejemplo: desayuno, almuerzo, arribo, despacho, checkin, etc..
    
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Servicio", mappedBy="actividades")
     */
	private $servicios;



    //-------------------
    
    public function __construct(){
		$this->servicios = new ArrayCollection();
	}
    
    /**
     * @return Tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param Tag $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    public function __toString()
    {
        return 'Actividad[' . parent::__toString() . $this->getTag()->__toString() . '] ';
    }

}

