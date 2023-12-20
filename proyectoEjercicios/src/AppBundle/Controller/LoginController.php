<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use synfony\component\hTTPkernel\Exception;

class LoginController extends Controller
{
    public function loginIncorrectoAction()
    {

       return $this->render("default/loginIncorrecto.html.twig");
    }

}
