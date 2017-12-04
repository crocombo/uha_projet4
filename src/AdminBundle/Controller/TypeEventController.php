<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\TypeEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typeevent controller.
 *
 */
class TypeEventController extends Controller
{
    /**
     * Lists all typeEvent entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeEvents = $em->getRepository('AdminBundle:TypeEvent')->findAll();

        return $this->render('typeevent/index.html.twig', array(
            'typeEvents' => $typeEvents,
        ));
    }

    /**
     * Creates a new typeEvent entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeEvent = new Typeevent();
        $form = $this->createForm('AdminBundle\Form\TypeEventType', $typeEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeEvent);
            $em->flush();

            return $this->redirectToRoute('typeevent_show', array('id' => $typeEvent->getId()));
        }

        return $this->render('typeevent/new.html.twig', array(
            'typeEvent' => $typeEvent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeEvent entity.
     *
     */
    public function showAction(TypeEvent $typeEvent)
    {
        $deleteForm = $this->createDeleteForm($typeEvent);

        return $this->render('typeevent/show.html.twig', array(
            'typeEvent' => $typeEvent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeEvent entity.
     *
     */
    public function editAction(Request $request, TypeEvent $typeEvent)
    {
        $deleteForm = $this->createDeleteForm($typeEvent);
        $editForm = $this->createForm('AdminBundle\Form\TypeEventType', $typeEvent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeevent_edit', array('id' => $typeEvent->getId()));
        }

        return $this->render('typeevent/edit.html.twig', array(
            'typeEvent' => $typeEvent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeEvent entity.
     *
     */
    public function deleteAction(Request $request, TypeEvent $typeEvent)
    {
        $form = $this->createDeleteForm($typeEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeEvent);
            $em->flush();
        }

        return $this->redirectToRoute('typeevent_index');
    }

    /**
     * Creates a form to delete a typeEvent entity.
     *
     * @param TypeEvent $typeEvent The typeEvent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeEvent $typeEvent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeevent_delete', array('id' => $typeEvent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
