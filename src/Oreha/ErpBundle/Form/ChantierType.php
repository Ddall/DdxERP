<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChantierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('debutPreparation', 'date', array(
                'label' => 'Date de préparation',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('debutTravaux', 'date', array(
                'label' => 'Date de début des travaux',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('finPrevue', 'date', array(
                'label' => 'Date prévisionelle de fin des travaux',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('finReele', 'date', array(
                'label' => 'Date de fin réele des travaux',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('adresse', new AdresseType, array(
                'label' => 'Localisation du chantier',
                'required' => false
            ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Chantier'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_chantiertype';
    }
}
