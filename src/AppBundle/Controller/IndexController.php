<?php

namespace AppBundle\Controller;

use AppBundle\Controller\EntitySearcherController;

use AppBundle\Entity\Usuario;
use AppBundle\Entity\BuscarViaje;
use AppBundle\Entity\Viaje;
use AppBundle\Entity\Evento;
use AppBundle\Entity\Promocion;

use AppBundle\Form\UsuarioType;
use AppBundle\Form\BuscarViajeType;

use AppBundle\Form\Publicidad\PublicidadViajeType;
use AppBundle\Form\Publicidad\PublicidadPromocionType;
use AppBundle\Form\Publicidad\PublicidadEventoType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use JMS\SecurityExtraBundle\Annotation\Secure;


class IndexController extends Controller{

    /**
     * @Route("/", name="home")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function indexHome(){
        $index = $this->container->get('templating');
        $html = $index->render('index/index.html.twig');
        return new Response($html);
    }

    /**
     * @Route("/serviciosGenerales", name="serviciosGenerales")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function indexServiciosGenerales(){
		
		$em = $this->getDoctrine()->getManager();
        $qrb = $em->getRepository('AppBundle:ServiciosGenerales')->createQueryBuilder('u');
        $result = $qrb->getQuery()->getResult();
        $colPublicidades = array();
        foreach($result as $index=>$sg){
			$publicidad = $sg->newPublicidad();
			$colPublicidades = array_merge(array($index=>$publicidad), $colPublicidades);
		}
        return $this->render('serviciosGenerales/sgIndex.html.twig', 
				array('publicidades'=>$colPublicidades));
	}

    /**
     * @Route("/publicBlog", name="publicBlog")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function indexBlog(Request $request){
		
        $em = $this->getDoctrine()->getManager();
        $qrb = $em->getRepository('AppBundle:Post')->createQueryBuilder('u');
        $qrb->join('u.sesion', 's');
        $result = $qrb->getQuery()->getResult();

        return $this->render('blog/mainBlog.html.twig', array(
			'posts' => $result));	
    }


    /**
     * @Route("/filterBlogByServicioGeneral", name="filterBlogServGeneral")
     * @Secure(roles="ROLE_USER ")
     */
    public function filterBlogServGeneral(Request $request){
		
        $em = $this->getDoctrine()->getManager();
        $qrb = $em->getRepository('AppBundle:Post')->createQueryBuilder('u');
        $qrb->join('u.sesion', 's');
        $result = $qrb->getQuery()->getResult();

        return $this->render('blog/mainBlog.html.twig', array(
			'posts' => $result));	
    }

    /**
     * @Route("/filterBlogByFecha", name="filterBlogFecha")
     * @Secure(roles="ROLE_USER ")
     */
    public function filterBlogFecha(Request $request){
		
        $em = $this->getDoctrine()->getManager();
        $qrb = $em->getRepository('AppBundle:Post')->createQueryBuilder('u');
        $qrb->join('u.sesion', 's');
        $result = $qrb->getQuery()->getResult();

        return $this->render('blog/mainBlog.html.twig', array(
			'posts' => $result));	
    }


}
