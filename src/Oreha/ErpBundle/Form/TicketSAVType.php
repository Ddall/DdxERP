<?php

namespace Oreha\ErpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TicketSAVType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule', 'text', array(
                'required' => true,
                'label' => 'Intitulé du problème'
            ))
            ->add('chrono', 'text', array(
                'required' => false,
                'label' => 'ChronoTicket'
            ))
            ->add('statut', 'choice', array(
                'required' => true,
                'choices' => array(
                    'ouvert' => 'Ouvert',
                    'ferme' => 'Fermé',
                    'attente_client' => 'En attente de retour client',
                    'attente_intervention' => 'Attente d\'intervention'
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oreha\ErpBundle\Entity\TicketSAV'
        ));
    }

    public function getName()
    {
        return 'oreha_erpbundle_ticketsavtype';
    }
}
