<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email')
            ->add('libelle', 'choice', array( 'choices' => 
                array('principal'=> 'Principal',
                    'secondaire'=> 'Secondaire',
                    'liste' => 'Liste de diffusion')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Email'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_emailtype';
    }
}
