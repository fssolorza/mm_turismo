<?php

/*
 * assertion? fechaInicio<FechaFin
 * 
*/

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

/**
 * ServiciosGenerales
 * @ORM\Table(name="serviciosGenerales")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiciosGeneralesRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"serviciosGenerales" = "ServiciosGenerales", "servicio"="Servicio", "promocion"="Promocion", "evento" = "Evento", "viaje"="Viaje"})
 * @Uploadable
 */
abstract class ServiciosGenerales
{
    // modela todos los tipos de servicios que la empresa puede proveer, con sus caracteristicas.

    /**
     * @var string
     * @ORM\Column(name="nombre", type="string", length=100)
     * @ORM\Id
     */
    private $nombre;

	/**
     * @var decimal
     * @ORM\Column(name="costo", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $costo;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="servicioGeneral")
     */
	private $posts;

    /**
     * @var string
     *
     * @ORM\Column(name="imageName", type="string", nullable=true)
     */
    private $imageName; //this will hold the filename of the uploaded file.


    /**
     * @UploadableField(mapping="serviciosGenerales_image", fileNameProperty="imageName", nullable=true)
     * @var File
     *
     */
    private $imageFile;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    
   	public abstract function newPublicidad();

    //--------------------

    /**
     * @param File|UploadedFile $image
     * @return ServiciosGenerales
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
     * @param string $imageName
     *
     * @return ServiciosGenerales
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }


    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ServiciosGenerales
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set costo
     *
     * @param Decimal $costo
     *
     * @return ServiciosGenerales
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return Decimal
     */
    public function getCosto()
    {
        return $this->costo;
    }



    public function __toString()
    {
        return 'ServiciosGenerales[' . $this->getNombre() . ', ' . $this->getCosto() . '] ';
    }



}

