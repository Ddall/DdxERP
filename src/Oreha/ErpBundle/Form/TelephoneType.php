<?php
namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TelephoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', 'text')
            ->add('libelle', 'choice', array( 'choices' => 
                array('portable'=> 'Portable',
                    'fixe'=> 'Ligne fixe',
                    'fax'=> 'Fax',
                    'standard' => 'Standard')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Telephone'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_telephonetype';
    }
}
