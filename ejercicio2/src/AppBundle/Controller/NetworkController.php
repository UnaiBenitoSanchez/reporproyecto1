<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use synfony\component\hTTPkernel\Exception;

class NetworkController extends Controller
{

    public function singinAction($name)
    {
        //Guardo el nombre en sesión
        $this->get('session')->set('name', $name);

        $nameS = $this->get('session')->get('name');

        //Mensaje flash
        $this->addFlash('mensaje', 'Hola ' . $nameS); //coger el name de la sesion 

        //Renderiza a página twig
        return $this->render('mensaje/index.html.twig');
    }


    public function languageAction($locale)
    {
        //Guardo el parámetro en sesión
        $this->get('session')->set('locale', $locale);

        $localeS = $this->get('session')->get('locale');

        //Comprobamos los valores del parámetro
        if ($localeS === 'es') {

            return $this->render('mensaje/sp.html.twig');
        } elseif ($localeS === 'en') {

            return $this->render('mensaje/en.html.twig');
        } else {

            return $this->render('mensaje/fr.html.twig');
        }
    }


    public function profileAction()
    {

        $name = $this->get('session')->get('name');
        $locale = $this->get('session')->get('locale');

        if ($locale === 'es') {

            $this->addFlash('mensaje', 'Perfil en uso: ' . $name);
            return $this->render('mensaje/index.html.twig');
        } elseif ($locale === 'en') {

            $this->addFlash('mensaje', 'User connected: ' . $name);
            return $this->render('mensaje/index.html.twig');
        } else {

            $this->addFlash('mensaje', 'Le profil de utilisateur: ' . $name);
            return $this->render('mensaje/index.html.twig');
        }
    }

    public function infoAction()
    {
        return $this->redirect('https://finofilipino.org/');
    }

    public function logoutAction()
    {
        $session=$this->get('session');
        $session->invalidate();
        $session->remove('name');
        $session->remove('locale');

        $this->addFlash('mensaje', 'Te has desconectado correctamente');
        return $this->render('mensaje/index.html.twig');
    }
}
