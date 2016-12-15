<?php


namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TagRepository")
 */
class Tag{

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="tipo", type="string")
     */
    private $tipo; //tipo={desayuno, almuerzo, cena, visita al museo, recepcion invitados, cortar la torarta, etc, ect}

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Actividad", mappedBy="tag")
     */
    private $actividades;


    //-----------------------

    public function __construct(){
        $this->actividades = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        //tipo = {casamiento, cena, recibimiento, brindis, visita al museo, etc}
        $this->tipo = $tipo;
    }
    /**
     * @return ArrayCollection
     */
    public function getActividades()
    {
        return $this->actividades;
    }

    /**
     * @param ArrayCollection $actividades
     */
    public function setActividades($actividades)
    {
        $this->actividades = $actividades;
    }

    public function __toString()
    {
        return 'Tag[' . $this->getTipo() .'] ';
    }

}
