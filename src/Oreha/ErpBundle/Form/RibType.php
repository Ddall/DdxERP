<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RibType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulaire', 'text', array(
                'required' => false,
                'label' => 'Titulaire du compte'
            ))
            ->add('banque', 'number', array(
                'required' => false,
                'max_length' => 5
            ))
            ->add('gichet', 'number', array(
                'required' => false,
                'max_length' => 5
            ))
            ->add('compte', 'number', array(
                'required' => false,
                'max_length' => 11,
            ))
            ->add('cle', 'number', array(
                'required' => false,
                'max_length' => 2,
            ))
            ->add('domiciliation', 'text', array(
                'required' => false,
                'max_length' => 255
            ))
            ->add('iban', 'text', array(
                'max_length' => 27,
                'required' => false
            ))
            ->add('bic', 'text', array(
                'required' => false,
                'max_length' => 11
            ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Rib'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_ribtype';
    }
}
