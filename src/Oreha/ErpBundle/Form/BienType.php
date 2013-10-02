<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse', new AdresseType())
            ->add('surface', 'text', array(
                'label' => 'Surface en m²',
                'required'=> true
                ))
            ->add('type', 'choice', array(
                'label' => 'Type de construction',
                'required' => true,
                'choices' => array(
                    'appartement'=> 'Appartement',
                    'maison' => 'Maison',
                    'bureaux' =>'Bureaux',
                    'copropriete'=>'Copropriété',
                    'autre' => 'Autre'
                    )
                ))
            ->add('anneeConstruction', 'text', array(
                'label'=>'Année de construction',
                'required' => false
                ))
            ->add('typeChauffage', 'choice', array(
                'label'=>'Type de chauffage installé',
                'required'=>false,
                'choices'=> array(
                    null => 'Inconnu', 
                    'gaz' => 'Gaz', 
                    'electrique'=> 'Electrique',
                    'fuel'=>'Fuel',
                    'bois' => 'Bois',
                    'renouvelable' => 
                    'Energies renouvelables',
                    'autre'=> 'Autre' )))
            ->add('typeEauChaude', 'choice', array('label'=>'Mode de production eau chaude installé', 'required'=>false, 'choices'=> array( null => 'Inconnu', 'gaz' => 'Gaz', 'electrique'=> 'Electrique', 'fuel'=>'Fuel', 'bois' => 'Bois', 'renouvelable' => 'Energies renouvelables', 'autre'=> 'Autre' )))
            ->add('dejaEuTravaux', 'checkbox', array('required'=>false, 'label'=>'Des travaux ont-ils déjà été réalisés'))
            ->add('travauxRealises','textarea', array('required'=> false, 'label'=> 'Descriptif des travaux réalisés') )
            ->add('valeurAvantTravaux','text', array('required'=> false, 'label'=> 'Valeur avant travaux', 'attr' => array('placeholder' => '€')) )
            ->add('dateTravauxRealises', 'text', array('required'=> false, 'label'=>'Date des travaux réalisés', 'attr' => array('class' => 'datepicker')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Bien'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_bientype';
    }
}
