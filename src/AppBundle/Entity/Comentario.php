<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComentarioRepository")
 */
class Comentario extends Post
{
   /**
     * @var string
     *
     * @ORM\Column(name="texto", type="string", length=255, nullable=false)
     */
    private $texto;

//-----------------------------------------

    /**
     * Set texto
     *
     * @param string $texto
     *
     * @return Comentario
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    public function __toString()
    {
        return 'Comentario[' . parent::__toString() . ', ' . $this->getTexto() . '] ';
    }
    
   /*
	 * Es utilizado por algun twig para mostrar informacion propia de cada subclase.
	 * */
    public function render()
    {
        return $this->getTexto();
    }    

}

