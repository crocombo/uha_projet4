<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\LevelOfAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Levelofaccess controller.
 *
 */
class LevelOfAccessController extends Controller
{
    /**
     * Lists all levelOfAccess entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $levelOfAccesses = $em->getRepository('AdminBundle:LevelOfAccess')->findAll();

        return $this->render('levelofaccess/index.html.twig', array(
            'levelOfAccesses' => $levelOfAccesses,
        ));
    }

    /**
     * Creates a new levelOfAccess entity.
     *
     */
    public function newAction(Request $request)
    {
        $levelOfAccess = new Levelofaccess();
        $form = $this->createForm('AdminBundle\Form\LevelOfAccessType', $levelOfAccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($levelOfAccess);
            $em->flush();

            return $this->redirectToRoute('levelofaccess_show', array('id' => $levelOfAccess->getId()));
        }

        return $this->render('levelofaccess/new.html.twig', array(
            'levelOfAccess' => $levelOfAccess,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a levelOfAccess entity.
     *
     */
    public function showAction(LevelOfAccess $levelOfAccess)
    {
        $deleteForm = $this->createDeleteForm($levelOfAccess);

        return $this->render('levelofaccess/show.html.twig', array(
            'levelOfAccess' => $levelOfAccess,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing levelOfAccess entity.
     *
     */
    public function editAction(Request $request, LevelOfAccess $levelOfAccess)
    {
        $deleteForm = $this->createDeleteForm($levelOfAccess);
        $editForm = $this->createForm('AdminBundle\Form\LevelOfAccessType', $levelOfAccess);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('levelofaccess_edit', array('id' => $levelOfAccess->getId()));
        }

        return $this->render('levelofaccess/edit.html.twig', array(
            'levelOfAccess' => $levelOfAccess,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a levelOfAccess entity.
     *
     */
    public function deleteAction(Request $request, LevelOfAccess $levelOfAccess)
    {
        $form = $this->createDeleteForm($levelOfAccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($levelOfAccess);
            $em->flush();
        }

        return $this->redirectToRoute('levelofaccess_index');
    }

    /**
     * Creates a form to delete a levelOfAccess entity.
     *
     * @param LevelOfAccess $levelOfAccess The levelOfAccess entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LevelOfAccess $levelOfAccess)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('levelofaccess_delete', array('id' => $levelOfAccess->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
