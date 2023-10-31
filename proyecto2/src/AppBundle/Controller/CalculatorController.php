<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends Controller

{
    public function indexAction($age){
    $currentYear=date("Y");
    
    return new Response('<html><body>Anio actual: '- $currentYear .-'<br/> 
                Anio de nacimiento: '. ($currentYear-$age) . '</body></html>');
    }
}