<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PretType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'required' => true,
                'label' => 'Type de financement'
            ))
            ->add('banque', 'text', array(
                'label' => 'Nom banque',
                'required' => false
            ))
            ->add('montant', 'text', array(
                'required' => false
            ))
            ->add('taux', 'percent', array(
                'required' => false
            ))
            ->add('date', 'date', array(
                'label' => 'Date de demande',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('dateAccepte', 'date', array(
                'label' => 'Date d\'acceptation',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('dateRefus', 'date', array(
                'label' => 'Date de refus',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('rib', new RibType(), array(
                'label' => 'Coordonées bancaires',
                'required' => false,
                'attr' => array(
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Pret'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_prettype';
    }
}
