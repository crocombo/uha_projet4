<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\ProjectUserRole;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Projectuserrole controller.
 *
 */
class ProjectUserRoleController extends Controller
{
    /**
     * Lists all projectUserRole entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projectUserRoles = $em->getRepository('AdminBundle:ProjectUserRole')->findAll();

        return $this->render('projectuserrole/index.html.twig', array(
            'projectUserRoles' => $projectUserRoles,
        ));
    }

    /**
     * Creates a new projectUserRole entity.
     *
     */
    public function newAction(Request $request)
    {
        $projectUserRole = new Projectuserrole();
        $form = $this->createForm('AdminBundle\Form\ProjectUserRoleType', $projectUserRole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectUserRole);
            $em->flush();

            return $this->redirectToRoute('projectuserrole_show', array('id' => $projectUserRole->getId()));
        }

        return $this->render('projectuserrole/new.html.twig', array(
            'projectUserRole' => $projectUserRole,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a projectUserRole entity.
     *
     */
    public function showAction(ProjectUserRole $projectUserRole)
    {
        $deleteForm = $this->createDeleteForm($projectUserRole);

        return $this->render('projectuserrole/show.html.twig', array(
            'projectUserRole' => $projectUserRole,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing projectUserRole entity.
     *
     */
    public function editAction(Request $request, ProjectUserRole $projectUserRole)
    {
        $deleteForm = $this->createDeleteForm($projectUserRole);
        $editForm = $this->createForm('AdminBundle\Form\ProjectUserRoleType', $projectUserRole);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projectuserrole_edit', array('id' => $projectUserRole->getId()));
        }

        return $this->render('projectuserrole/edit.html.twig', array(
            'projectUserRole' => $projectUserRole,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a projectUserRole entity.
     *
     */
    public function deleteAction(Request $request, ProjectUserRole $projectUserRole)
    {
        $form = $this->createDeleteForm($projectUserRole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projectUserRole);
            $em->flush();
        }

        return $this->redirectToRoute('projectuserrole_index');
    }

    /**
     * Creates a form to delete a projectUserRole entity.
     *
     * @param ProjectUserRole $projectUserRole The projectUserRole entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProjectUserRole $projectUserRole)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projectuserrole_delete', array('id' => $projectUserRole->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
