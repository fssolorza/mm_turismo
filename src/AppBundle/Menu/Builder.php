<?php

namespace AppBundle\Menu;

use JMS\SecurityExtraBundle\Metadata\Driver\AnnotationDriver;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Knp\Menu\MenuItem;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
//use Symfony\Component\Security\Core\SecurityContext;

class Builder
{
    /** @var ContainerInterface */
    private $container;

    /** @var Router */
    private $router;

    /**
     * @var SecurityContext
     */
    private $securityContext;

    /**
     * @var \JMS\SecurityExtraBundle\Metadata\Driver\AnnotationDriver
     */
    private $metadataReader;

    function __construct(ContainerInterface $container)
    {

        $this->container = $container;
        $this->router = $this->container->get('router');
//        $this->securityContext = $this->container->get('security.context');

        $this->securityContext = $this->container->get('security.token_storage');
  
        $this->metadataReader = new AnnotationDriver(new \Doctrine\Common\Annotations\AnnotationReader());
    }

    /**
     * @param $class
     * @return \JMS\SecurityExtraBundle\Metadata\ClassMetadata
     */
    public function getMetadata($class)
    {
        return $this->metadataReader->loadMetadataForClass(new \ReflectionClass($class));
    }

    public function hasRouteAccess($routeName)
    {
        $token = $this->securityContext->getToken();
        if ($token->isAuthenticated()) {
            $route = $this->router->getRouteCollection()->get($routeName);
            $controller = $route->getDefault('_controller');
            
            
            list($class, $method) = explode('::', $controller, 2);

            $metadata = $this->getMetadata($class);
            if (!isset($metadata->methodMetadata[$method])) {
                return false;
            }

            foreach ($metadata->methodMetadata[$method]->roles as $role) {
                
                
                if ($this->container->get('security.authorization_checker')->isGranted($role)) {
//                if ($this->securityContext->isGranted($role)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function filterMenu(ItemInterface $menu)
    {
        foreach ($menu->getChildren() as $child) {
            /** @var \Knp\Menu\MenuItem $child */
            $routes = $child->getExtra('routes');
            
            dump($routes);
            
            if ($routes !== null) {
                $route = current(current($routes));

                if ($route && !$this->hasRouteAccess($route)) {
                    $menu->removeChild($child);
                }

            }
            $this->filterMenu($child);
        }
        return $menu;
    }

    public function createAdminMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        
		$menu->setChildrenAttribute('class', 'nav navbar-nav');
		
		$menu->addChild('Inicio', array(
                'route' => 'home'
            ));

		$menu->addChild('Servicios y Promociones', array(
                'route' => 'serviciosGenerales'
            ));

		$menu->addChild('Blog', array('route' => 'publicBlog'));
            
		$menu->addChild('Log in', array(
                'route' => 'fos_user_security_login'
            ));

		$menu->addChild('RegistrarDatos', array('label'=>'Registrar Datos'))
			->setAttribute('dropdown', true);

		$menu->getChild('RegistrarDatos')->addChild('Registrar Pais', array('route'=>'registrarPais'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Ciudad', array('route'=>'registrarCiudad'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Direccion', array('route'=>'registrarDireccion'));		
		$menu->getChild('RegistrarDatos')->addChild('Registrar Aeroupuerto', array('route'=>'registrarAeropuerto'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Hotel', array('route'=>'registrarHotel'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Salon', array('route'=>'registrarSalon'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Tag', array('route'=>'registrarTag'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Viaje', array('route'=>'registrarViaje'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Evento', array('route'=>'registrarEvento'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Promocion', array('route'=>'registrarPromocion'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Cliente', array('route'=>'registrarCliente'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Contrato', array('route'=>'registrarContrato'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Comentario', array('route'=>'registrarComentario'));
		$menu->getChild('RegistrarDatos')->addChild('Registrar Foto', array('route'=>'registrarFoto'));
		
		$menu->addChild('BuscarDatos', array('label'=>'Busquedas'))
			->setAttribute('dropdown', true);

		$menu->getChild('BuscarDatos')->addChild('Buscar Viaje', array('route'=>'buscarViaje'));
		$menu->getChild('BuscarDatos')->addChild('Buscar Eventos', array('route'=>'searchEvento'));
		$menu->getChild('BuscarDatos')->addChild('Buscar Promocion', array('route'=>'searchPromocion'));
			
									
        $this->filterMenu($menu);

		if ($this->container->get('security.authorization_checker')->isGranted('ROLE_USER')){
   			$menu->addChild('Log out', array('route' => 'fos_user_security_logout'))->getParent();
   							
		} else{
			$menu->addChild('Contacto')->setAttribute('dropdown', true);
			$menu->getChild('Contacto')
				->addChild('Login', array('route' => 'fos_user_security_login'))->getParent()
				->addChild('Registrar Usuario', array('route'=>'fos_user_registration_register'));
		}
		
        return $menu;
    }



	public function createBlogMenu(FactoryInterface $factory){
		
		$menu = $factory->createItem('root');
        
		$menu->setChildrenAttribute('class', 'nav navbar-nav');
		
		$menu->addChild('Nuevo Comentario', array(
                'route' => 'registrarComentario'
            ));
		$menu->addChild('Subir Foto', array(
                'route' => 'registrarFoto'
            ));
        
        
		$menu->addChild('Buscar')->setAttribute('dropdown', true);
		$menu->getChild('Buscar')
				->addChild('Filtrar por Servicio Contratado', array('route' => 'filterBlogServGeneral'))->getParent()
				->addChild('Filtrar por fecha', array('route'=>'filterBlogFecha'));
        
        
           
         
        $this->filterMenu($menu);      
		return $menu;
	}

}
