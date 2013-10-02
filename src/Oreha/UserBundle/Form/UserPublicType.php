<?php

namespace Oreha\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserPublicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', 'text', array(
                'required' => true,
                'label' => 'Nom complet'
            ))
            ->add('email', 'email', array(
                'required' => true,
                'label' => 'Email'
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'oreha_userbundle_usertype';
    }
}
