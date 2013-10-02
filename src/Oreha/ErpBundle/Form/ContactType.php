<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite', 'choice', array(
                'label' => 'Civilité',
                'required' => false,
                'choices' => array(
                    'mademoiselle' => 'Mademoiselle',
                    'madame' => 'Madame',
                    'monsieur' => 'Monsieur'
                )
            ))
            ->add('prenom', 'text', array(
                'required' => false,
                'label'=> 'Prénom',
                'attr' =>  array(
                    'placeholder'=>'Prénom'
                    )
                ))

            ->add('nom', 'text', array(
                'required' => true,
                'attr' =>  array(
                    'placeholder'=>'Nom'
                    )
                ))
            ->add('type', 'choice', array('choices' => array('part' => 'Particulier', 'pro' => 'Professionnnel')))
            ->add('societe', 'text', array('label' => 'Société',  'required'=> false, 'attr' =>  array('placeholder'=>'Société')))
            ->add('commentaire', 'textarea', array('required' => false, 'attr' =>  array('placeholder'=>'Commentaire')))
            ->add('adresse', new AdresseType(), array('required' => false))
//            ->add('emails', 'collection', array('type'          => new EmailType,
//                                                'required'      => false,
//                                                'allow_add'     => true,
//                                                'allow_delete'  => true,
//                                                'attr' => array(
//                                                    'class' => 'email-box',
//                                                )
//                ))
                
//           ->add('telephones', 'collection', array('type'       => new TelephoneType(),
//                                                   'allow_add'  => true,
//                                                   'allow_delete'=> true))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Contact'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_contacttype';
    }
}
