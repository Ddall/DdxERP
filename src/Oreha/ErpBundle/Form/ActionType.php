<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array( 'choices' => array(
                'commentaire' => 'Commentaire',
                'appel' => 'Appel',
                'rendez-vous' => 'Rendez-vous'
            ) ))
            ->add('message', 'textarea', array('required'=> false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Action'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_actiontype';
    }
}
