<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IntervenantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('role', 'choice', array(
                'required' => true,
                'choices' => array(
                    'Conducteur de travaux' => 'Conducteur de travaux',
                    'Chef de chantier' => 'Chef de chantier',
                )
            ))
            ->add('user', 'entity', array(
                'required' => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Intervenant'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_intervenanttype';
    }
}
