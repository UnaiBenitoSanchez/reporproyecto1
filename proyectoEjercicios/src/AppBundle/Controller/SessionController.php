<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use synfony\component\hTTPkernel\Exception;

class SessionController extends Controller
{
    public function loginCorrectoAction($mensaje)
    {
       return new Response($mensaje);
    }

        public function loginAction($user, $password)
    {

        if ($user === 'admin' && $password === '1234') {

            $this->get('session')->set('user', $user);
            
            return $this->forward('AppBundle:Session:loginCorrecto', array('mensaje' => 'Has iniciado sesión correctamente'));
        
        } elseif ($password[0] === strtoupper($password[0])) {

            throw $this->createNotFoundException('La contraseña debe empezar por minúscula');
        } else {

            return $this->redirect($this->generateUrl('loginIncorrecto'));

        }
    }
}
