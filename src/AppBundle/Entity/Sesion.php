<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sesion
 *
 * @ORM\Table(name="sesion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SesionRepository")
 */
class Sesion
{
     /**
     * @var \DateTime
     * 
     * @ORM\Id
     * @ORM\Column(name="fecha", type="string")
     */
    private $fecha;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="hora", type="string")
     * @ORM\Id
     */
    private $hora;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario", inversedBy="sesiones", cascade={"PERSIST"})
     * @ORM\Id
     */
    private $usuario;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="sesion")
     */
    private $posts;



    //--------------------------------------------------------

    public function __construct(){
        $this-> posts = new ArrayCollection();
        $this->fecha = (new \DateTime('now'))->format('Y-m-d');
        $this->hora = (new \DateTime('now'))->format('H:i:s');
    }

    /**
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param \DateTime $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }


    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Sesion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }



    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     */
    public function setUsuario(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }


    /**
     * @return ArrayCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param ArrayCollection $posts
     */
    public function setPosts(ArrayCollection $posts)
    {
        $this->posts = $posts;
    }


    /**
     * @return string
     */
    public function __toString()
    {
//        if(!is_null($this->fecha) and !is_null($this->usuario))
//            return $this->getFecha() . ' - ' . $this->getUsuario()->__toString();
        return 'Sesion[' . $this->getFecha() .', ' .$this->getHora() . ', ' . $this->getUsuario()->__toString() . ']';
    }

}

