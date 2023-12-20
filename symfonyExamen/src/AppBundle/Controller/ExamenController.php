<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use synfony\component\hTTPkernel\Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ExamenController extends Controller
{

    public function indexAction($mensaje)
    {
        return new Response('<html><body><em>' . $mensaje . '</em>' . '!</body></html>');
    }

    public function nombreusuarioAction($username)
    {
        if ($username !== 'admin') {

            throw new AccessDeniedHttpException('No eres admin');
        } else {
            return $this->render('default/admin.html.twig');
        }
    }

    public function sumaAction(int $num1, int $num2){

        $suma = $num1 + $num2;
        return new Response('Suma: ' . $suma);

    }

    public function divideAction(int $num1, int $num2){
        
        $div = $num1 / $num2;
        return new Response('División: ' . $div);

    }

    public function validacionAction($u)
    {
       return new Response($u);
    }

        public function loginAction($usu, int $pass)
    {

        if ($usu == 'admin' && $pass == '1234') {

            $this->get('session')->set('usu', $usu);
            
            return $this->forward('AppBundle:Examen:validacion', array('u' => 'Has iniciado sesión correctamente ' .$this->get('session')->get('usu')));
        
        } elseif ($usu[0] === strtoupper($usu[0])) {

            throw $this->createNotFoundException('El usuario debe empezar por minúscula');
        } else {

            return $this->redirect($this->generateUrl('login_incorrecto'));

        }
    }
}
