<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DossierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule', 'text', array('required' => true, 'label'=> 'Intitulé'))
            ->add('source', 'entity', array(
                'required' => true,
                'class' => 'OrehaErpBundle:Source',
                'property' => 'intitule',
                'query_builder' => function(\Doctrine\ORM\EntityRepository $er){
                    return $er->createQueryBuilder('s')
                            ->select('s')
                            ->where('s.desactive = false')
                            ;
                }
            ))
            ->add('typeDossier', 'choice', array('label'=> 'Type de dossier', 'choices' => array(
                'particulier'   => 'Particulier',
                'professionnel' => 'Professionnel/Liberal',
                'sci'           => 'SCI',
                'copropriete'   => 'Copropriété')
                ))
            ->add('appreciation', 'choice', array(
                'required' => false,
                'choices' => array(
                    'positive' => 'Positive',
                    'neutre' => 'Neutre',
                    'negative' => 'Negative'
                )
                ))
            ->add('description', 'textarea', array('required' => false))
            ;
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Dossier'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_dossiertype';
    }
}
