<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;


/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="postType", type="string")
 * @ORM\DiscriminatorMap({"foto" = "Foto", "comentario"="Comentario"})
 * @Uploadable
 */
abstract class Post
{
    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="hora", type="string")
     * @ORM\Id
     */
    private $hora;

    /**
     * @var string
     * 
     * @ORM\Column(name="titulo", type="string", length=100)
     * @ORM\Id
     */
    private $titulo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sesion", inversedBy="posts")
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="sesion_fecha", referencedColumnName="fecha"),
     *     @ORM\JoinColumn(name="sesion_hora", referencedColumnName="hora"),
     *     @ORM\JoinColumn(name="sesion_usuario_id", referencedColumnName="usuario_id"))
     */     
    private $sesion; //el ultimo JoinColumn se debe en definitiva a que usamos FOSUserBundle

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ServiciosGenerales", inversedBy="posts")
     * @ORM\JoinColumn(name="serviciosGenerales_nombre", referencedColumnName="nombre")
     */
    private $servicioGeneral;

    /**
     * @var string
     * @ORM\Column(name="fileDir", type="string", length=255, nullable=true)
     */
    private $fileDir;

    /**
     * @UploadableField(mapping="post_image", fileNameProperty="fileDir", nullable=true)
     * @var File
     *
     */
    private $imageFile;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;





    //-----------------------------------------------------------

	public function __construct(){
		$this->hora = (new \DateTime('now'))->format('H:i:s');
	}
	
	
	/**
     * @param File|UploadedFile $image
     * @return Post
     */
    public function setImageFile(File $image=null){
        $this->imageFile = $image;
        if($image){
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $fileDir
     *
     * @return Post
     */
    public function setFileDir($fileDir)
    {
        $this->fileDir = $fileDir;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileDir()
    {
        return $this->fileDir;
    }


    /**
     * @return Sesion
     */
    public function getSesion()
    {
        return $this->sesion;
    }

    /**
     * @param Sesion $sesion
     */
    public function setSesion(Sesion $sesion)
    {
        $this->sesion = $sesion;
    }


    /**
     * @return ServiciosGenerales
     */
    public function getServicioGeneral(){
        return $this->servicioGeneral;
    }

    /**
     * @param ServiciosGenerales $servicioGeneral
     */
    public function setServicioGeneral(ServiciosGenerales $servicioGeneral)
    {
        $this->servicioGeneral = $servicioGeneral;
    }


    /**
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return Post
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function __toString()
    {
        return 'Post[ to do...]';
    }

	/*
	 * Es utilizado por algun twig para mostrar informacion propia de cada subclase.
	 * */
    public function render()
    {
        return '';
    }

}

