<?php
/*
 * Este controller es solo para pruebas... puede eliminarse
 * */
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("", name="home2")
     * @Template("index/index.html.twig")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function indexAction()
    {
        return $this->render('index/index.html.twig', []);
    }
    /**
     * @Route("/test", name="test")
     * @Template("index/index.html.twig")
     * @Secure(roles="IS_AUTHENTICATED_ANONYMOUSLY ")
     */
    public function testAction()
    {
        return $this->render('index/index.html.twig', []);
    }
    /**
     * @Route("/test1", name="test1")
     * @Template("index/index.html.twig")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function test1Action()
    {
        return $this->render('index/index.html.twig', []);
    }
    /**
     * @Route("/test2", name="test2")
     * @Template("index/index.html.twig")
     * @Secure(roles="ROLE_USER ")
     */
    public function test2Action()
    {
        return $this->render('index/index.html.twig', []);
    }
}
