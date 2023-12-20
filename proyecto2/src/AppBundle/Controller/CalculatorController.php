<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class CalculatorController extends Controller

    /* 
    *@Route("/calculator/{age}")
    */

{
    public function indexAction($age){

    $currentYear = date("Y");
    $year = $currentYear - $age; 
    
    
    return $this->render('calculator/index.html.twig', array('year' => $year));
    }

}