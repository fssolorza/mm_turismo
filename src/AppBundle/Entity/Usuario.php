<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * Usuario
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario extends BaseUser{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;	

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Cliente", inversedBy="usuario")
     * @ORM\JoinColumn(name="cliente_dni", referencedColumnName="dni")
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Sesion", mappedBy="usuario")
     */
    private $sesiones;




//---------------------------------------------------------------

    public function __construct(){
		parent::__construct();
        $this->sesiones = new ArrayCollection();
        $this->fechaRegistro = new \DateTime();
    }

    /**
     * @return ArrayCollection
     */
    public function getSesiones()
    {
        return $this->sesiones;
    }

    /**
     * @param ArrayCollection $sesiones
     */
    public function setSesiones(ArrayCollection $sesiones)
    {
        $this->sesiones = $sesiones;
    }


    /**
     * @return Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function __toString(){
       return 'Usuario['. parent::getUsername() .', '. parent::getMail() . ']';
    }


}

