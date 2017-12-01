<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Problematic;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Problematic controller.
 *
 */
class ProblematicController extends Controller
{
    /**
     * Lists all problematic entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $problematics = $em->getRepository('AdminBundle:Problematic')->findAll();

        return $this->render('problematic/index.html.twig', array(
            'problematics' => $problematics,
        ));
    }

    /**
     * Creates a new problematic entity.
     *
     */
    public function newAction(Request $request)
    {
        $problematic = new Problematic();
        $form = $this->createForm('AdminBundle\Form\ProblematicType', $problematic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($problematic);
            $em->flush();

            return $this->redirectToRoute('problematic_show', array('id' => $problematic->getId()));
        }

        return $this->render('problematic/new.html.twig', array(
            'problematic' => $problematic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a problematic entity.
     *
     */
    public function showAction(Problematic $problematic)
    {
        $deleteForm = $this->createDeleteForm($problematic);

        return $this->render('problematic/show.html.twig', array(
            'problematic' => $problematic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing problematic entity.
     *
     */
    public function editAction(Request $request, Problematic $problematic)
    {
        $deleteForm = $this->createDeleteForm($problematic);
        $editForm = $this->createForm('AdminBundle\Form\ProblematicType', $problematic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('problematic_edit', array('id' => $problematic->getId()));
        }

        return $this->render('problematic/edit.html.twig', array(
            'problematic' => $problematic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a problematic entity.
     *
     */
    public function deleteAction(Request $request, Problematic $problematic)
    {
        $form = $this->createDeleteForm($problematic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($problematic);
            $em->flush();
        }

        return $this->redirectToRoute('problematic_index');
    }

    /**
     * Creates a form to delete a problematic entity.
     *
     * @param Problematic $problematic The problematic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Problematic $problematic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('problematic_delete', array('id' => $problematic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
