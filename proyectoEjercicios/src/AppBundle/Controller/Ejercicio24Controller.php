<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Ejercicio24Controller extends Controller
{
    // /**
    //  * @Route("/nueva-accion/{username}", name="nueva_accion")
    //  */

    public function nuevaAccionAction($username)
    {
        
        if ($username !== 'admin') {
            
            throw new AccessDeniedHttpException('No eres admin');
        }

        return new Response('Tu si eres admin');
    }
}