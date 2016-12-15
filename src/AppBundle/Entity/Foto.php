<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Post;
use Doctrine\ORM\Mapping as ORM;



/**
 * Foto
 *
 * @ORM\Table(name="foto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FotoRepository")
 */
class Foto extends Post
{
    
    /**
     * @var int
     *
     * @ORM\Column(name="peso", type="smallint", nullable=true)
     */
    private $peso;


    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;



    //-----------------------------



    /**
     * Set peso
     *
     * @param integer $peso
     *
     * @return Foto
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return int
     */
    public function getPeso()
    {
        return $this->peso;
    }


    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Foto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }


    public function __toString()
    {
        return 'Foto[' .  parent::__toString() . ', ' . $this->getDescripcion().
        $this->getPeso() . '] ';
    }
    
    
    
   /*
	 * Es utilizado por algun twig para mostrar informacion propia de cada subclase.
	 * */
    public function render()
    {
        return '<img class="slide" src="{{ asset('. $this->getImageFile() . ') }}" > ';
    }

}
