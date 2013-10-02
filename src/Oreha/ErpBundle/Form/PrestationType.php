<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('famille', 'entity', array(
                'required' => true,
                'class' => 'OrehaErpBundle:FamillePrestation',
                'property' => 'nom',
                'query_builder' => function(\Doctrine\ORM\EntityRepository $er){
                    return $er->createQueryBuilder('s')
                            ->select('s')
                            ->where('s.active = true')
                            ;
                }
            ))
            ->add('realisePar', 'entity', array(
                'required' => true,
                'label' => 'Prestation réalisée par',
                'class' => 'OrehaUserBundle:User',
                'property' => 'fullName',
                'query_builder' => function(\Doctrine\ORM\EntityRepository $er){
                    return $er->createQueryBuilder('u')
                            ->select('u')
                            ->where('u.enabled = true')
                            ;
                }
            ))
            ->add('montant', 'number', array(
                'required' => false,
                'attr' => array(
                    'placeholder' => 'laisser libre si gratuit'
                )
            ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Prestation'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_prestationtype';
    }
}
