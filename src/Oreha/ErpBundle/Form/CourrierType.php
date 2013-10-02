<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CourrierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('required' => true))
            ->add('element', 'choice', array('required' => true, 'choices' => array(
                'dossier' => 'Dossier',
                'client' => 'Client'
            )))
            ->add('corps', 'textarea', array(
                'required' => true,
                'attr' => array(
                    'class' => 'tinymce'
                )
            ))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Courrier'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_courriertype';
    }
}
