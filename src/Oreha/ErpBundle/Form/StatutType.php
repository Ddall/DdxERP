<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StatutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', 'choice', array('required' => true,
                'label' => 'Transferer vers le statut',
                'choices'=> array(
                    'rendez-vous' => 'R - Rendez-vous',
                    'etude'=> 'E - Etude',
//                    'client'=> 'Client',
//                    'chantier'=> ' Chantier',
//                    'garantie'=> 'Garantie',
                )))
            ->add('budget', 'text', array(
                'required' => false
                ))
            ->add('chiffrage', 'text', array(
                'required' => false
                ))
            ->add('suiviPar', 'entity', array(
                'required' => true,
                'label' => 'Suivi par',
                'class' => 'OrehaUserBundle:User',
                'property' => 'fullName'
                ))
            ->add('description', 'textarea', array(
                'required' => false,
                'label' => 'Commentaires sur le transfert',
                'attr' => array(
                    'placeholder' => 'Commentaire...',
                    'rows' => 7
                    )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Statut'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_statuttype';
    }
}
