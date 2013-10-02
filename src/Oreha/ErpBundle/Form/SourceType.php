<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'required' => true,
                'attr'=>array('placeholder'=>'Nom'
                    )))
            ->add('desactive', 'checkbox', array(
                'required' => false,
                'label' => 'Desactiver cette source',
                'attr' => array(
                    'class' => 'inline'
                )))
            ->add('type', 'choice',  array('choices' => array(
                'salon' => 'Salon',
                'technicommercial' => 'Prospection Technico Commercial',
                'internet' => 'Site Internet',
                'contactteldirect' => 'Contact telephonique direct',
                'reseau' => 'Réseau',
                'partenaire' => 'Partenaire',
                'autre' => 'Autre'
            )))
            ->add('date', 'date', array(
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'input-append datetime',
                    'id' => 'timepick',
                    'data-format' => 'dd/MM/yyyy'
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Source'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_sourcetype';
    }
}
