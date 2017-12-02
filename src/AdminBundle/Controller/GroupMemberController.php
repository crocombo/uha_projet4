<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\GroupMember;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Groupmember controller.
 *
 */
class GroupMemberController extends Controller
{
    /**
     * Lists all groupMember entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupMembers = $em->getRepository('AdminBundle:GroupMember')->findAll();

        return $this->render('groupmember/index.html.twig', array(
            'groupMembers' => $groupMembers,
        ));
    }

    /**
     * Creates a new groupMember entity.
     *
     */
    public function newAction(Request $request)
    {
        $groupMember = new Groupmember();
        $form = $this->createForm('AdminBundle\Form\GroupMemberType', $groupMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupMember);
            $em->flush();

            return $this->redirectToRoute('groupmember_show', array('id' => $groupMember->getId()));
        }

        return $this->render('groupmember/new.html.twig', array(
            'groupMember' => $groupMember,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupMember entity.
     *
     */
    public function showAction(GroupMember $groupMember)
    {
        $deleteForm = $this->createDeleteForm($groupMember);

        return $this->render('groupmember/show.html.twig', array(
            'groupMember' => $groupMember,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupMember entity.
     *
     */
    public function editAction(Request $request, GroupMember $groupMember)
    {
        $deleteForm = $this->createDeleteForm($groupMember);
        $editForm = $this->createForm('AdminBundle\Form\GroupMemberType', $groupMember);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupmember_edit', array('id' => $groupMember->getId()));
        }

        return $this->render('groupmember/edit.html.twig', array(
            'groupMember' => $groupMember,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupMember entity.
     *
     */
    public function deleteAction(Request $request, GroupMember $groupMember)
    {
        $form = $this->createDeleteForm($groupMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupMember);
            $em->flush();
        }

        return $this->redirectToRoute('groupmember_index');
    }

    /**
     * Creates a form to delete a groupMember entity.
     *
     * @param GroupMember $groupMember The groupMember entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupMember $groupMember)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupmember_delete', array('id' => $groupMember->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
