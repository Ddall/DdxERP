<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', 'text', array(
                'required' => false,
                'label' => 'Libellé'
            ))
            ->add('chronoFacture', 'text', array(
                'required' => false,
                'label' => 'ChronoFacture'
            ))
            ->add('echeance', 'date', array(
                'required' => true,
                'label'=> 'Date d\'échéance',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy ',
                'attr' => array(
                    'class' => 'date datepicker', 
                    'id' => 'echeancepicker',
                    'readonly' => 'true'
                    )
            ))
            ->add('montantHT', 'number', array(
                'required' => true,
                'label' => 'Montant HT'
            ))
            ->add('montantTVAReduite', 'number', array(
                'required' => false,
                'label' => 'Montant TVA Réduite'
            ))
                
            ->add('montantTVANormale', 'number', array(
                'required' => false,
                'label' => 'Montant TVA Normale'
            ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Facture'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_facturetype';
    }
}
