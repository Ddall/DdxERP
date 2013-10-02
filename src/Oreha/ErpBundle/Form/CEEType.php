<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CEEType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('familleCEE', 'entity', array(
                'label' => 'Type de CEE',
                'class' => 'OrehaErpBundle:FamilleCEE',
                'property' => 'nameCode',
                'required' => true,
                'multiple' => false
            ) )
            ->add('nom', 'text', array(
                'required' => true,
                'label' => 'Nom'
            ))
            ->add('montant', 'number', array(
                'required' => true
            ))
            ->add('dateDemande', 'date', array(
                'label' => 'Date de la demande',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('dateEnvoiInstruction', 'date', array(
                'label' => 'Date d\'envoi en instruction',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('dateRetourInstruction', 'date', array(
                'label' => 'Date de de retour d\'instruction',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
                
            ->add('retourInstruction', 'text', array(
                'required' => false,
                'label' => 'Résultat d\'instruction'
            ))


        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\CEE'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_ceetype';
    }
}
