<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Pais;
use AppBundle\Entity\Ciudad;
use AppBundle\Entity\Direccion;

use AppBundle\Entity\Lugar;
use AppBundle\Entity\Aeropuerto;
use AppBundle\Entity\Hotel;
use AppBundle\Entity\Salon;

use AppBundle\Entity\Itinerario;
use AppBundle\Entity\Actividad;

use AppBundle\Entity\ServiciosGenerales;
use AppBundle\Entity\Promocion;
use AppBundle\Entity\Servicio;
use AppBundle\Entity\Viaje;
use AppBundle\Entity\Evento;

use AppBundle\Entity\Cliente;
use AppBundle\Entity\Contrato;

use AppBundle\Entity\Sesion;
use AppBundle\Entity\Usuario;

use AppBundle\Entity\Post;
use AppBundle\Entity\Foto;
use AppBundle\Entity\Comentario;



use AppBundle\Entity\BuscarViaje;

use AppBundle\Form\PaisType;
use AppBundle\Form\CiudadType;
use AppBundle\Form\DireccionType;

use AppBundle\Form\LugarType;
use AppBundle\Form\AeropuertoType;
use AppBundle\Form\HotelType;
use AppBundle\Form\SalonType;


use AppBundle\Form\ItinerarioType;
use AppBundle\Form\ActividadType;


use AppBundle\Form\ServiciosGeneralesType;
use AppBundle\Form\ServicioType;
use AppBundle\Form\ViajeType;
use AppBundle\Form\EventoType;
use AppBundle\Form\PromocionType;


use AppBundle\Form\ClienteType;
use AppBundle\Form\ContratoType;

use AppBundle\Form\SesionType;
use AppBundle\Form\UsuarioType;

use AppBundle\Form\PostType;
use AppBundle\Form\FotoType;
use AppBundle\Form\ComentarioType;


use AppBundle\Form\BuscarViajeType;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EntityShowController extends Controller{
	
    /**
     * @Route("/show/viaje", name="showViaje")
    */
    public function showViaje(Request $request){
		
		$viaje = new Viaje();
		$viaje->setNombre('nombre del viaje');
		$form =  $this->createForm(ViajeType::class, $viaje);
		
		$form->handleRequest($request);
		
		if($form->isValid()){
			return $this->render('mostrar/showViaje.html.twig', array('form'=>$form->createView()));

		} else
			return $this->render('mostrar/showViaje.html.twig', 
				array('form'=>$form->createView()));
    }


    /**
     * @Route("/show/pais", name="showPais")
    */
    public function showPais(Request $request){
		
		$form =  $this->createForm(PaisType::class, new Pais());
		$form->handleRequest($request);
		if($form->isSubmitted() && $form->isValid()){
			$inputPais = $form->getData();
			
			$em = $this->getDoctrine()->getManager();
			$paisRepository = $em->getRepository('AppBundle:Pais');
			
			$formEntity = $this->createForm(PaisType::class, $paisRepository->buscarPaisSimilar($inputPais));
			return $this->render('mostrar/showPais.html.twig',
				array('form'=>$formEntity->createView()));
		}else{
			return $this->render('mostrar/showPais.html.twig',
				array('form'=>$form->createView()));
		}
    }
   

    
}
