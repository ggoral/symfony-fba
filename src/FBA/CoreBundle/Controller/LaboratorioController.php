<?php

namespace FBA\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FBA\CoreBundle\Entity\Laboratorio;
use FBA\CoreBundle\Form\LaboratorioType;

/**
 * Laboratorio controller.
 *
 * @Route("/laboratorio")
 */
class LaboratorioController extends Controller
{

    /**
     * Lists all Laboratorio entities.
     *
     * @Route("/", name="laboratorio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FBACoreBundle:Laboratorio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Laboratorio entity.
     *
     * @Route("/", name="laboratorio_create")
     * @Method("POST")
     * @Template("FBACoreBundle:Laboratorio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Laboratorio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('laboratorio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Laboratorio entity.
     *
     * @param Laboratorio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Laboratorio $entity)
    {
        $form = $this->createForm(new LaboratorioType(), $entity, array(
            'action' => $this->generateUrl('laboratorio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Laboratorio entity.
     *
     * @Route("/new", name="laboratorio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Laboratorio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Laboratorio entity.
     *
     * @Route("/{id}", name="laboratorio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Laboratorio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Laboratorio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Laboratorio entity.
     *
     * @Route("/{id}/edit", name="laboratorio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Laboratorio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Laboratorio entity.');
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
    * Creates a form to edit a Laboratorio entity.
    *
    * @param Laboratorio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Laboratorio $entity)
    {
        $form = $this->createForm(new LaboratorioType(), $entity, array(
            'action' => $this->generateUrl('laboratorio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Laboratorio entity.
     *
     * @Route("/{id}", name="laboratorio_update")
     * @Method("PUT")
     * @Template("FBACoreBundle:Laboratorio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Laboratorio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Laboratorio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('laboratorio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Laboratorio entity.
     *
     * @Route("/{id}", name="laboratorio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FBACoreBundle:Laboratorio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Laboratorio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('laboratorio'));
    }

    /**
     * Creates a form to delete a Laboratorio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('laboratorio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
