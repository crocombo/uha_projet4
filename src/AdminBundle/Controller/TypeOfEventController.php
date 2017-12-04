<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\TypeOfEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typeofevent controller.
 *
 */
class TypeOfEventController extends Controller
{
    /**
     * Lists all typeOfEvent entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeOfEvents = $em->getRepository('AdminBundle:TypeOfEvent')->findAll();

        return $this->render('typeofevent/index.html.twig', array(
            'typeOfEvents' => $typeOfEvents,
        ));
    }

    /**
     * Creates a new typeOfEvent entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeOfEvent = new Typeofevent();
        $form = $this->createForm('AdminBundle\Form\TypeOfEventType', $typeOfEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeOfEvent);
            $em->flush();

            return $this->redirectToRoute('typeofevent_show', array('id' => $typeOfEvent->getId()));
        }

        return $this->render('typeofevent/new.html.twig', array(
            'typeOfEvent' => $typeOfEvent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeOfEvent entity.
     *
     */
    public function showAction(TypeOfEvent $typeOfEvent)
    {
        $deleteForm = $this->createDeleteForm($typeOfEvent);

        return $this->render('typeofevent/show.html.twig', array(
            'typeOfEvent' => $typeOfEvent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeOfEvent entity.
     *
     */
    public function editAction(Request $request, TypeOfEvent $typeOfEvent)
    {
        $deleteForm = $this->createDeleteForm($typeOfEvent);
        $editForm = $this->createForm('AdminBundle\Form\TypeOfEventType', $typeOfEvent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeofevent_edit', array('id' => $typeOfEvent->getId()));
        }

        return $this->render('typeofevent/edit.html.twig', array(
            'typeOfEvent' => $typeOfEvent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeOfEvent entity.
     *
     */
    public function deleteAction(Request $request, TypeOfEvent $typeOfEvent)
    {
        $form = $this->createDeleteForm($typeOfEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeOfEvent);
            $em->flush();
        }

        return $this->redirectToRoute('typeofevent_index');
    }

    /**
     * Creates a form to delete a typeOfEvent entity.
     *
     * @param TypeOfEvent $typeOfEvent The typeOfEvent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeOfEvent $typeOfEvent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeofevent_delete', array('id' => $typeOfEvent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
