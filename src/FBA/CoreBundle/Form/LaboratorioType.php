<?php

namespace FBA\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LaboratorioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('institucion')
            ->add('sector')
            ->add('responsable')
            ->add('domicilio')
            ->add('correspondencia')
            ->add('ciudad')
            ->add('pais')
            ->add('codigoPostal')
            ->add('email')
            ->add('telefono')
            ->add('tipoLaboratorio')
            ->add('empresa')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FBA\CoreBundle\Entity\Laboratorio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fba_corebundle_laboratorio';
    }
}
