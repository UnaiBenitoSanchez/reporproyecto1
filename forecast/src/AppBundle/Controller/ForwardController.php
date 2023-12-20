<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class ForwardController extends Controller
{

    public function indexAction(){
        $response = $this->forward('AppBundle:Forward:finish', array(
            'test' => true
        ));
        return $response;
    }

    public function finishAction($test){
        if ($test){
            return new Response('Redirection done recieving the parameter succesfully');
        } else {
            return new Response('Parameter was not recieved succesfully');
        }
    }
}
