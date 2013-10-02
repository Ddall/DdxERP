<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
//use Doctrine\ORM\EntityRepository;

class RendezvousType extends AbstractType
{
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
               
        
        $builder
            ->add('date', 'datetime', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy H:mm',
                'attr' => array( 'class' => 'date datetimepicker', 'id' => 'rdvpicker')
            ))
            ->add('lieu', new AdresseType(), array('required' => false, 'attr' => array('class'=> 'addr')))
            ->add('contact', 'entity', array(
                // TODO FIX THIS
                'class' => 'OrehaErpBundle:Contact',
                'property' => 'fullName'
            ))
            ->add('description', 'textarea', array(
                'attr' => array('cols' => 500, 'rows' => 5)
                ))
            ->add('choixLieu', 'choice', array(
                'required' => false,
                'label' => 'Lieu du rendez-vous',
                'mapped' => false,
                'choices' => array(
                    'addrContact' => 'Adresse du contact',
                    'addrBien' => 'Adresse d\'un bien du dossier',
                    'addrLibre' => 'Saisir l\'adresse manuellement',
                    'telephone' => 'Rendez-vous téléphonique'
                ),
                'attr' => array(
                    'id' => 'choixAdresse'
                )))
            ;
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Rendezvous'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_rendezvoustype';
    }
}
