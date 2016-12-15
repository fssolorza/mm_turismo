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

use JMS\SecurityExtraBundle\Annotation\Secure;

class EntitySearcherController extends Controller
{
    /**
     * @Route("/search/pais", name="searchPais")
     */
    public function showSearchPais(Request $request)
    {
        return $this->showDisplayForm('Pais', PaisType::class, new Pais(), $request);
    }
    
    /**
     * @Route("/search/ciudad", name="searchCiudad")
     */
    public function showSearchCliudad(Request $request)
    {
        return $this->showDisplayForm('Ciudad', CiudadType::class, new Ciudad(), $request);
    }

	/**
     * @Route("/search/direccion", name="searchDireccion")
     */
    public function showSearchDireccion(Request $request)
    {
        return $this->showDisplayForm('Direccion', DireccionType::class, new Direccion(), $request);
    }

    /**
     * @Route("/search/cliente", name="searchCliente")
     */
    public function showSearchCliente(Request $request)
    {
        return $this->showDisplayForm('Cliente', ClienteType::class, new Cliente(), $request);
    }

    /**
     * @Route("/search/contrato", name="searchContrato")
     */
    public function showSearchContrato(Request $request)
    {
        return $this->showDisplayForm('Contrato', ContratoType::class, new Contrato(), $request);
    }

    /**
     * @Route("/search/lugar", name="searchLugar")
     */
    public function showSearchLugar(Request $request)
    {
        return $this->showDisplayForm('Lugar', LugarType::class, new Lugar(), $request);
    }

    /**
     * @Route("/search/hotel", name="searchHotel")
     */
    public function showSearchHotel(Request $request)
    {
        return $this->showDisplayForm('Hotel', HotelType::class, new Hotel(), $request);
    }


    /**
     * @Route("/search/aeropuerto", name="searchAeropuerto")
     */
    public function showSearchAeropuerto(Request $request)
    {
        return $this->showDisplayForm('Aeropuerto', AeropuertoType::class, new Aeropuerto(), $request);
    }

    /**
     * @Route("/search/salon", name="searchSalon")
     */
    public function showSearchSalon(Request $request){
        return $this->showDisplayForm('Salon', SalonType::class, new Salon(), $request);
    }


    /**
     * @Route("/search/usuario", name="searchUsuario")
     */
    public function showSearchUsuario(Request $request){
        return $this->showDisplayForm('Usuario', UsuarioType::class, new Usuario(), $request);
    }

    /**
     * @Route("/search/sesion", name="searchSesion")
     */
    public function showSearchSesion(Request $request){
        return $this->showDisplayForm('Sesion', SesionType::class, new Sesion(), $request);
    }

    /**
     * @Route("/search/foto", name="searchFoto")
     */
    public function showSearchFoto(Request $request){
        return $this->showDisplayForm('Foto', FotoType::class, new Foto(), $request);
    }

    /**
     * @Route("/search/comentario", name="searchComentario")
     */
    public function showSearchComentario(Request $request){
        return $this->showDisplayForm('Comentario', ComentarioType::class, new Comentario(), $request);
    }


    /**
     * @Route("/search/viaje", name="searchViaje")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function showSearchViaje(Request $request)
    {
        return $this->showDisplayForm('Viaje', ViajeType::class, new Viaje(), $request);
    }

    /**
     * @Route("/search/evento", name="searchEvento")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function showSearchEvento(Request $request)
    {
        return $this->showDisplayForm('Evento', EventoType::class, new Evento(), $request);
    }

    /**
     * @Route("/search/promocion", name="searchPromocion")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function showSearchPromocion(Request $request)
    {
        return $this->showDisplayForm('Promocion', PromocionType::class, new Promocion(), $request);
    }

    /**
     * @Route("/search/actividad", name="searchActividad")
     */
    public function showSearchActividad(Request $request)
    {
        return $this->showDisplayForm('Actividad', ActividadType::class, new Actividad(), $request);
    }

    /**
     * @Route("/search/itinerario", name="searchItinerario")
     */
    public function showSearchItinerario(Request $request)
    {
        return $this->showDisplayForm('Itinerario', ItinerarioType::class, new Itinerario(), $request);
    }
    
    
    /**
     * @Route("/buscarViaje", name="buscarViaje")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function buscarViaje(Request $request){
/*
 * Para lograr una funcionalidad un poco mas util, es necesario crear un objeto BuscarViaje para que se lige con otro objeto BuscarViajeType. Ademas BuscarViajeType no puede ser mostrado por cualquier twig. Es necesario crear un twig para mostrar este BuscarViajeType que proporcione el javascript correspondiente para hacer uso a los eventListeners que estan configurados en BuscarViajeType.
 * 
 * El objeto BuscarViaje no es de interes realmente para el usuario. No se carga en la base de datos tampoco. El usuario esta buscando un objeto (ie una entidad cargada en la base de datos) Viaje. El objeto BuscarViaje es una abstraccion al proceso de busqueda que el usuario final experimenta al ir especificando detalles parciales del viaje que desea hacer. Cuando estos detalles son cargados el usuario hace clic en Buscar y entonces el sistema encontraria una lista de aquellas entidades Viaje que estan cargadas en la base de datos y que posteriormente el usuario puede "abrir" para leer los ultimos detalles del viaje como el costo y tal vez las actividades que dicho viaje tiene. Entonces el objeto BuscarViaje es desajo de lado y la atencion se centraria sobre la entidad Viaje.
 * 
*/
		$form =  $this->createForm(BuscarViajeType::class, new BuscarViaje());
		$form->handleRequest($request);
		
		if($form->isValid()){
			$formEntity = $this->createForm(ViajeType::class, $form->getData()->getViaje());
			//esto de acontinuacion NO funciona. En realidad hay que crear un nuevo twig para mostrar un objeto BuscarViaje o Viaje.
			return $this->render('members/generalDisplay.html.twig',
            array('form'=>$formEntity->createView()));

		} else
			return $this->render('servicios/buscarServicio.html.twig', 
				array('form'=>$form->createView()));
    }
    
    

    /**
     * @Route("/display/{entityName}/{$entityTypeClass}/{defaultObjEntity}", name="display")
     */
    public function showDisplayForm($entityName, $entityTypeClass, $defaultObjEntity, Request $request){
/*
 * Esta funcion solo acepta formType que no tengan ningun selectBox. Solamente textType o IntegerType o DateType, pero no son aceptados forms que posean atributos de algun otro tipo "complejo" parecidos a los EntityType
*/


        $formEntity = $this->createForm($entityTypeClass, $defaultObjEntity);
        $formEntity->handleRequest($request);
		dump($formEntity->getData());
//la forma de buscar la entidad es bastante rara! ver de mejorarla.
//en realidad es muy parecida al form BuscarViaje
        if($request->getMethod()=='POST'){ //si agregamos isValid() no nos dejara hacer la busqueda
            $arr = $request->get(strtolower($entityName));
            $em = $this->getDoctrine()->getManager();
            $repoEntity = $em->getRepository('AppBundle:'.$entityName);
            $criteria = array();
            foreach($arr as $elem=>$mapped_elem) {
                if (($mapped_elem <> '') and ($elem <> '_token') and
                    (!is_null($mapped_elem)) and $formEntity->has($elem)){
                    $criteria = array_merge(array($elem => $mapped_elem), $criteria);
                }
            }
            $defaultObjEntity = $repoEntity->findOneBy($criteria);
            $formEntity = $this->createForm($entityTypeClass, $defaultObjEntity);
        }
        return $this->render('members/generalDisplay.html.twig',
            array('form'=>$formEntity->createView()));
    }
    
}
