<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', 'textarea', array(
                'attr' => array(
                    'placeholder'=> '...',
                    'class' => 'span5',
                    'rows'=> 5
                    ),
                'required' => false,
                'label' => 'Message'
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\Commentaire'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_commentairetype';
    }
}
