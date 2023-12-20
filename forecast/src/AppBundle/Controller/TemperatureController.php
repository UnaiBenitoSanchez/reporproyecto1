<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TemperatureController extends Controller
{

    public function getAction($id){
        if ($id == null || $id != 1){
            throw $this->createNotFoundException('The register requested does not exist');
        } else  {
            return new Response("Register " . $id);
        }
    }

    public function checkAction(Request $request){

        $session = $request->getSession();
        $log = $session->get('log', array());

        array_push($log, 'Temperature checked at ' . date('l jS \of F Y h:i:s A'));
        $session->set('log', $log);

        return new Response('Temperature checked and log persisted succesfully');

    }

    public function getAllAction(Request $request){
        $session = $request->getSession();
        $log = $session->get('log', array());
        $result = '';

        foreach ($log as $item)
            $result .= $item . '<br>';
        return new Response ($result);
    }
}
