<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class LocationController extends Controller
{
    public function indexAction(){
        $this->addFlash('location', 'You are located in Oviedo, Spain');
        return $this->render('location/index.html.twig');
    }

    public function indexJsonAction(){
        $response = new Response(json_encode(array('location' => 'You are located in Oviedo, Spain')));
        $response->headers->set('Content-type','application/json');
        return $response;
    }
}
