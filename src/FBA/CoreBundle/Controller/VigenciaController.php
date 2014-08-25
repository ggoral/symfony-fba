<?php

namespace FBA\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FBA\CoreBundle\Entity\Vigencia;
use FBA\CoreBundle\Form\VigenciaType;

/**
 * Vigencia controller.
 *
 * @Route("/vigencia")
 */
class VigenciaController extends Controller
{

    /**
     * Lists all Vigencia entities.
     *
     * @Route("/", name="vigencia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FBACoreBundle:Vigencia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Vigencia entity.
     *
     * @Route("/", name="vigencia_create")
     * @Method("POST")
     * @Template("FBACoreBundle:Vigencia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Vigencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vigencia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Vigencia entity.
     *
     * @param Vigencia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Vigencia $entity)
    {
        $form = $this->createForm(new VigenciaType(), $entity, array(
            'action' => $this->generateUrl('vigencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Vigencia entity.
     *
     * @Route("/new", name="vigencia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Vigencia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Vigencia entity.
     *
     * @Route("/{id}", name="vigencia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Vigencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vigencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Vigencia entity.
     *
     * @Route("/{id}/edit", name="vigencia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Vigencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vigencia entity.');
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
    * Creates a form to edit a Vigencia entity.
    *
    * @param Vigencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Vigencia $entity)
    {
        $form = $this->createForm(new VigenciaType(), $entity, array(
            'action' => $this->generateUrl('vigencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Vigencia entity.
     *
     * @Route("/{id}", name="vigencia_update")
     * @Method("PUT")
     * @Template("FBACoreBundle:Vigencia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Vigencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vigencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('vigencia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Vigencia entity.
     *
     * @Route("/{id}", name="vigencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FBACoreBundle:Vigencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vigencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vigencia'));
    }

    /**
     * Creates a form to delete a Vigencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vigencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
