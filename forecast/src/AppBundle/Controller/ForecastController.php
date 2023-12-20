<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ForecastController extends Controller {

    public function indexRequestAction($weather, $temperature, Request $request) {

        return new Response('<html><body>Weather info in ' . $request->query->get("city") . ': It\'s ' . $weather .
        ' and the temperature is: ' . $temperature .
        ' ºC </body></html>');

    }

}