<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PayementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', 'text', array(
                'required' => false,
                'label' => 'Intitulé'
            ))
            ->add('date', 'date', array(
                'required' => true,
                'label'=> 'Date de payement',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'data' => new \DateTime(),
                'attr' => array(
                    'class' => 'date datepicker', 
                    'id' => 'echeancepicker',
                    'readonly' => 'true'
                    )
            ))
            ->add('montant', 'number', array(
                'required' => true,
                'label' => 'Montant'
            ))
            ->add('mode', 'choice', array(
                'required' => true,
                'label' => 'Mode de réglement',
                'choices' => array(
                    'cheque'  => 'Chèque',
                    'virement' => 'Virement',
                    'prelevement' => 'Prélèvement',
                    'especes' => 'Espèces',
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Payement'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_payementtype';
    }
}
