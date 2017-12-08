<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{


// INDEX **************************************************************************************************************
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $actualities = $em->getRepository('AdminBundle:Actuality')->findAll();
        $myEvents = $em->getRepository('AdminBundle:MyEvent')->findAll();

        return $this->render('AppBundle:Default:index.html.twig', array(
            'actualities' => $actualities,
            'myEvents' => $myEvents,
            ));
    }


// QUI_SOMMES_NOUS *****************************************************************************************************
    public function whoareweAction()
    {
        return $this->render('AppBundle:Default:whoarewe.html.twig');
    }


// ACTUALITIE **********************************************************************************************************
     public function newAction()
    {

        $em = $this->getDoctrine()->getManager();
        $actualities = $em->getRepository('AdminBundle:Actuality')->findAll();


        return $this->render('AppBundle:Default:new.html.twig', array('actualities' => $actualities,));
    }   


// EVENT **************************************************************************************************************
      public function eventAction()
    {

        $em = $this->getDoctrine()->getManager();
        $myEvents = $em->getRepository('AdminBundle:MyEvent')->findAll();

        return $this->render('AppBundle:Default:event.html.twig', array('myEvents' => $myEvents,));
    }  


// PARTNER ************************************************************************************************************
     public function partnerAction()
    {
        return $this->render('AppBundle:Default:partner.html.twig');
    }


// CONTACT ************************************************************************************************************
     public function contactAction()
    {
        return $this->render('AppBundle:Default:contact.html.twig');
    }



}












