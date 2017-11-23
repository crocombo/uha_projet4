<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }


    public function whoareweAction()
    {
        return $this->render('AppBundle:Default:whoarewe.html.twig');
    }


     public function newAction()
    {
        return $this->render('AppBundle:Default:new.html.twig');
    }   


      public function eventAction()
    {
        return $this->render('AppBundle:Default:event.html.twig');
    }  
    

     public function partnerAction()
    {
        return $this->render('AppBundle:Default:partner.html.twig');
    }


     public function contactAction()
    {
        return $this->render('AppBundle:Default:contact.html.twig');
    }



}