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

        $nameS=$this->get('session')->get('name');

        //Mensaje flash
        $this->addFlash('default', 'Hola ' . $nameS);//coger el name de la sesion 

        //Renderiza a página twig
        return $this->render('default/index1.html.twig');
    }


    public function languageAction($locale){

        //Guardo el parámetro en sesión
        $this->get('session')->set('locale', $locale);

        $localeS=$this->get('session')->get('locale');

        //Comprobamos los valores del parámetro
        if($localeS === 'es'){

            $this->addFlash('default', 'Hola!');
            return $this->render('default/es.html.twig');

        }elseif($localeS === 'en'){

            $this->addFlash('default', 'Hello!');
            return $this->render('default/en.html.twig');

        }else{

            $this->addFlash('default', 'Bonjour!');
            return $this->render('default/fr.html.twig');

        }

    }


    public function profileAction(){

        $name=$this->get('session')->get('name');
        $locale=$this->get('session')->get('locale');

        if($locale === 'es'){

            $this->addFlash('default', 'Perfil en uso: ' . $name);
            return $this->render('default/index1.html.twig');

        }elseif($locale === 'en'){

            $this->addFlash('default', 'User connected: ' . $name);
            return $this->render('default/index1.html.twig');
        }else{

            $this->addFlash('default', 'Le profil de utilisateur: ' . $name);
            return $this->render('default/index1.html.twig');

        }

    }

    public function infoAction(){
        return $this->redirect('https://finofilipino.org/');
    }

    public function logoutAction(){
        $this->get('session')->set('name', '');
        $this->get('session')->set('locale', '');

        $this->addFlash('default', 'Te has desconectado correctamente');
        return $this->render('default/index1.html.twig');
    }

}
