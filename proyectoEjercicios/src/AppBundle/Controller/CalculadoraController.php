<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use synfony\component\hTTPkernel\Exception;

class CalculadoraController extends Controller
{

    public function operacionesAction($num1, $num2){

        $suma = $num1 + $num2;
        $resta = $num1 - $num2;
        $div = $num1 / $num2;
        $mult = $num1 * $num2;

        return new Response('Suma: ' . $suma . ', resta: ' . $resta . ', división: ' . $div . ', multiplicación: ' . $mult);

    }

}
