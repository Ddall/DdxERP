<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeclarationAdministrativeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'required' => true,
                'label' => 'Intitulé'
            ))
            ->add('famille', 'entity', array(
                'required' => true,
                'label' => 'Type de déclaration',
                'class' => 'OrehaErpBundle:FamilleDeclaration',
                'property' => 'nom',
                'query_builder' => function(\Doctrine\ORM\EntityRepository $er){
                    return $er->createQueryBuilder('f')
                            ->select('f')
                            ->where('f.active = true')
                            ;
                }
            ))
            ->add('dateDepot', 'date', array(
                'label' => 'Date de depot',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('dateAccepte', 'date', array(
                'label' => 'Date d\'acceptation',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
            ->add('dateRefus', 'date', array(
                'label' => 'Date de refus',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array( 'class' => 'date datepicker')
            ))
                
            ->add('commentaire', 'textarea', array(
                'required'=> false,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\DeclarationAdministrative'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_declarationadministrativetype';
    }
}
