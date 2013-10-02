<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('voie', 'text', array('required' =>false))
            ->add('complement', 'text', array('required' =>false))
            ->add('codePostal', 'text', array('required' =>false, 'label' => 'Code postal'))
            ->add('ville', 'text', array('required' =>false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Adresse'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_adressetype';
    }
}
