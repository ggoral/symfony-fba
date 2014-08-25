<?php

namespace FBA\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResultadoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaRecepcion')
            ->add('fechaAnalisis')
            ->add('fechaIngreso')
            ->add('encuesta')
            ->add('laboratorio')
            ->add('analito')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FBA\CoreBundle\Entity\Resultado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fba_corebundle_resultado';
    }
}
