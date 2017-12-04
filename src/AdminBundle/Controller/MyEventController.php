<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\MyEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Myevent controller.
 *
 */
class MyEventController extends Controller
{
    /**
     * Lists all myEvent entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $myEvents = $em->getRepository('AdminBundle:MyEvent')->findAll();

        return $this->render('myevent/index.html.twig', array(
            'myEvents' => $myEvents,
        ));
    }

    /**
     * Creates a new myEvent entity.
     *
     */
    public function newAction(Request $request)
    {
        $myEvent = new Myevent();
        $form = $this->createForm('AdminBundle\Form\MyEventType', $myEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($myEvent);
            $em->flush();

            return $this->redirectToRoute('myevent_show', array('id' => $myEvent->getId()));
        }

        return $this->render('myevent/new.html.twig', array(
            'myEvent' => $myEvent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a myEvent entity.
     *
     */
    public function showAction(MyEvent $myEvent)
    {
        $deleteForm = $this->createDeleteForm($myEvent);

        return $this->render('myevent/show.html.twig', array(
            'myEvent' => $myEvent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing myEvent entity.
     *
     */
    public function editAction(Request $request, MyEvent $myEvent)
    {
        $deleteForm = $this->createDeleteForm($myEvent);
        $editForm = $this->createForm('AdminBundle\Form\MyEventType', $myEvent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('myevent_edit', array('id' => $myEvent->getId()));
        }

        return $this->render('myevent/edit.html.twig', array(
            'myEvent' => $myEvent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a myEvent entity.
     *
     */
    public function deleteAction(Request $request, MyEvent $myEvent)
    {
        $form = $this->createDeleteForm($myEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($myEvent);
            $em->flush();
        }

        return $this->redirectToRoute('myevent_index');
    }

    /**
     * Creates a form to delete a myEvent entity.
     *
     * @param MyEvent $myEvent The myEvent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MyEvent $myEvent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('myevent_delete', array('id' => $myEvent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
