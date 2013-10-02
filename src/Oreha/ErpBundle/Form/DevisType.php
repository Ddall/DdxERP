<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('realisePar', 'entity', array(
                'required' => true,
                'label' => 'Devis réalisé par',
                'class' => 'OrehaUserBundle:User',
                'property' => 'fullName',
                'query_builder' => function(\Doctrine\ORM\EntityRepository $er){
                    return $er->createQueryBuilder('u')
                            ->select('u')
                            ->where('u.enabled = true')
                            ;
                }
            ))
            ->add('chronoDevis', 'text', array(
                'required' => true,
                'label' => 'Chrono Devis'
            ))
            ->add('date', 'date', array(
                'label' => 'Date d\'emission du devis',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'date datepicker',
                    )
            ))
            ->add('dateRemise', 'date', array(
                'label' => 'Date de remise au client',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'date datepicker'
                    )
            ))
            ->add('dateSignature', 'date', array(
                'label' => 'Date de signature client',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'date datepicker'
                    )
            ))
            ->add('dateRefus', 'date', array(
                'label' => 'Date de refus',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'date datepicker'
                    )
            ))
            ->add('delaiContractuel', 'number', array(
                'label' => 'Délai contractuel',
                'required' => false
            ))
            ->add('montantHT', 'number', array(
                'label' => 'Montant HT',
                'required' => false
            ))
            ->add('montantTVANormale', 'number', array(
                'label' => 'Montant TVA Normale',
                'required' => false
            ))
            ->add('montantTVAReduite', 'number', array(
                'label' => 'Montant TVA Reduite',
                'required' => false
            ))
            ->add('remiseAccordee', 'percent', array(
                'label' => 'Remise accordée',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'en %'
                )
            ))
            ->add('modeReglement', 'choice', array(
                'label' => 'Mode de reglement',
                'required' => false,
                'choices' => array(
                    'cheque' => 'Chèque',
                    'virement' => 'Virement',
                    'especes' => 'Espèces'
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Devis'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_devistype';
    }
}
