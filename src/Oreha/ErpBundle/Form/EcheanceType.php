<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EcheanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', 'text', array(
                'required' => true,
                'label' =>'Nom de la tache'
            ))
            ->add('date', 'datetime', array(
                'required' => true,
                'label'=> 'Date de l\'échéance',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy H:mm',
                'data' => new \DateTime('now + 15 days'),
                'attr' => array(
                    'class' => 'date datetimepicker', 
                    'id' => 'echeancepicker',
                    'readonly' => 'true'
                    )
            ))
            ->add('description', 'textarea', array(
                'required' => false
            ))
            ->add('avancement', 'number', array(
                'required' => false,
                
            ))
            ->add('user', 'entity', array(
                'required' => true,
                'label' => 'Tache suivie par',
                'class' => 'OrehaUserBundle:User',
                'property' => 'fullName',
                'required' => false
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Echeance'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_echeancetype';
    }
}
