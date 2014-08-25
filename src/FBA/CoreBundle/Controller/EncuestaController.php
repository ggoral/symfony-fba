<?php

namespace FBA\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FBA\CoreBundle\Entity\Encuesta;
use FBA\CoreBundle\Form\EncuestaType;

/**
 * Encuesta controller.
 *
 * @Route("/encuesta")
 */
class EncuestaController extends Controller
{

    /**
     * Lists all Encuesta entities.
     *
     * @Route("/", name="encuesta")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FBACoreBundle:Encuesta')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Encuesta entity.
     *
     * @Route("/", name="encuesta_create")
     * @Method("POST")
     * @Template("FBACoreBundle:Encuesta:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Encuesta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('encuesta_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Encuesta entity.
     *
     * @param Encuesta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Encuesta $entity)
    {
        $form = $this->createForm(new EncuestaType(), $entity, array(
            'action' => $this->generateUrl('encuesta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Encuesta entity.
     *
     * @Route("/new", name="encuesta_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Encuesta();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Encuesta entity.
     *
     * @Route("/{id}", name="encuesta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Encuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Encuesta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Encuesta entity.
     *
     * @Route("/{id}/edit", name="encuesta_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Encuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Encuesta entity.');
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
    * Creates a form to edit a Encuesta entity.
    *
    * @param Encuesta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Encuesta $entity)
    {
        $form = $this->createForm(new EncuestaType(), $entity, array(
            'action' => $this->generateUrl('encuesta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Encuesta entity.
     *
     * @Route("/{id}", name="encuesta_update")
     * @Method("PUT")
     * @Template("FBACoreBundle:Encuesta:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FBACoreBundle:Encuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Encuesta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('encuesta_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Encuesta entity.
     *
     * @Route("/{id}", name="encuesta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FBACoreBundle:Encuesta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Encuesta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('encuesta'));
    }

    /**
     * Creates a form to delete a Encuesta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('encuesta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
