<?php

namespace Oreha\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', 'text', array(
                'required' => true,
                'label' => 'Nom complet'
            ))
            ->add('username', 'text', array(
                'required' => true,
                'label' => 'Login'
            ))
            ->add('email', 'email', array(
                'required' => true,
                'label' => 'Email'
            ))
            ->add('enabled', 'checkbox', array(
                'required' => false,
                'label' => 'Compte activé'
            ))
            ->add('groups', 'entity', array(
                'label' => 'Groupes',
                'required'  => false,
                'class' => 'OrehaUserBundle:Group',
                'multiple' => true,
                'property' => 'name'
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
