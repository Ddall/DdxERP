<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FamilleDeclarationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'required' => true
            ))
            ->add('code', 'text', array(
                'required' => true
            ))
            ->add('active', 'checkbox', array(
                'required' => false,
                'label' => 'Famille active '
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\FamilleDeclaration'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_familledeclarationtype';
    }
}
