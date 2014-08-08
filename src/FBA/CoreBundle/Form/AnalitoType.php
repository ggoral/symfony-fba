<?php

namespace FBA\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnalitoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('metodo')
            ->add('calibrador')
            ->add('reactivo')
            ->add('papelFiltro')
            ->add('valorCorte')
            ->add('comentario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FBA\CoreBundle\Entity\Analito'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fba_corebundle_analito';
    }
}
