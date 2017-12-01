<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\TypeOfProblematic;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typeofproblematic controller.
 *
 */
class TypeOfProblematicController extends Controller
{
    /**
     * Lists all typeOfProblematic entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeOfProblematics = $em->getRepository('AdminBundle:TypeOfProblematic')->findAll();

        return $this->render('typeofproblematic/index.html.twig', array(
            'typeOfProblematics' => $typeOfProblematics,
        ));
    }

    /**
     * Creates a new typeOfProblematic entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeOfProblematic = new Typeofproblematic();
        $form = $this->createForm('AdminBundle\Form\TypeOfProblematicType', $typeOfProblematic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeOfProblematic);
            $em->flush();

            return $this->redirectToRoute('typeofproblematic_show', array('id' => $typeOfProblematic->getId()));
        }

        return $this->render('typeofproblematic/new.html.twig', array(
            'typeOfProblematic' => $typeOfProblematic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeOfProblematic entity.
     *
     */
    public function showAction(TypeOfProblematic $typeOfProblematic)
    {
        $deleteForm = $this->createDeleteForm($typeOfProblematic);

        return $this->render('typeofproblematic/show.html.twig', array(
            'typeOfProblematic' => $typeOfProblematic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeOfProblematic entity.
     *
     */
    public function editAction(Request $request, TypeOfProblematic $typeOfProblematic)
    {
        $deleteForm = $this->createDeleteForm($typeOfProblematic);
        $editForm = $this->createForm('AdminBundle\Form\TypeOfProblematicType', $typeOfProblematic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeofproblematic_edit', array('id' => $typeOfProblematic->getId()));
        }

        return $this->render('typeofproblematic/edit.html.twig', array(
            'typeOfProblematic' => $typeOfProblematic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeOfProblematic entity.
     *
     */
    public function deleteAction(Request $request, TypeOfProblematic $typeOfProblematic)
    {
        $form = $this->createDeleteForm($typeOfProblematic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeOfProblematic);
            $em->flush();
        }

        return $this->redirectToRoute('typeofproblematic_index');
    }

    /**
     * Creates a form to delete a typeOfProblematic entity.
     *
     * @param TypeOfProblematic $typeOfProblematic The typeOfProblematic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeOfProblematic $typeOfProblematic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeofproblematic_delete', array('id' => $typeOfProblematic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
