<?php

namespace FBA\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FBA\CoreBundle\Entity\Analito;
use FBA\CoreBundle\Form\AnalitoType;

/**
 * Analito controller.
 *
 * @Route("/analito")
 */
class AnalitoController extends Controller
{

    /**
     * Lists all Analito entities.
     *
     * @Route("/", name="analito")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FBACoreBundle:Analito')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Analito entity.
     *
     * @Route("/", name="analito_create")
     * @Method("POST")
     * @Template("FBACoreBundle:Analito:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Analito();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('analito_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Analito entity.
    *
    * @param Analito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Analito $entity)
    {
        $form = $this->createForm(new AnalitoType(), $entity, array(
            'action' => $this->generateUrl('analito_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Analito entity.
     *
     * @Route("/new", name="analito_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Analito();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Analito entity.
     *
     * @Route("/{id}", name="analito_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Analito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Analito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Analito entity.
     *
     * @Route("/{id}/edit", name="analito_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Analito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Analito entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Analito entity.
    *
    * @param Analito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Analito $entity)
    {
        $form = $this->createForm(new AnalitoType(), $entity, array(
            'action' => $this->generateUrl('analito_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Analito entity.
     *
     * @Route("/{id}", name="analito_update")
     * @Method("PUT")
     * @Template("FBACoreBundle:Analito:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Analito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Analito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('analito_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Analito entity.
     *
     * @Route("/{id}", name="analito_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FBACoreBundle:Analito')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Analito entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('analito'));
    }

    /**
     * Creates a form to delete a Analito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('analito_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
