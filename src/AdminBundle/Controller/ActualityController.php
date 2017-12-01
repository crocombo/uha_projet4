<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Actuality;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Actuality controller.
 *
 */
class ActualityController extends Controller
{
    /**
     * Lists all actuality entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actualities = $em->getRepository('AdminBundle:Actuality')->findAll();

        return $this->render('actuality/index.html.twig', array(
            'actualities' => $actualities,
        ));
    }

    /**
     * Creates a new actuality entity.
     *
     */
    public function newAction(Request $request)
    {
        $actuality = new Actuality();
        $form = $this->createForm('AdminBundle\Form\ActualityType', $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actuality);
            $em->flush();

            return $this->redirectToRoute('actuality_show', array('id' => $actuality->getId()));
        }

        return $this->render('actuality/new.html.twig', array(
            'actuality' => $actuality,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a actuality entity.
     *
     */
    public function showAction(Actuality $actuality)
    {
        $deleteForm = $this->createDeleteForm($actuality);

        return $this->render('actuality/show.html.twig', array(
            'actuality' => $actuality,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing actuality entity.
     *
     */
    public function editAction(Request $request, Actuality $actuality)
    {
        $deleteForm = $this->createDeleteForm($actuality);
        $editForm = $this->createForm('AdminBundle\Form\ActualityType', $actuality);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actuality_edit', array('id' => $actuality->getId()));
        }

        return $this->render('actuality/edit.html.twig', array(
            'actuality' => $actuality,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a actuality entity.
     *
     */
    public function deleteAction(Request $request, Actuality $actuality)
    {
        $form = $this->createDeleteForm($actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actuality);
            $em->flush();
        }

        return $this->redirectToRoute('actuality_index');
    }

    /**
     * Creates a form to delete a actuality entity.
     *
     * @param Actuality $actuality The actuality entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Actuality $actuality)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actuality_delete', array('id' => $actuality->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
