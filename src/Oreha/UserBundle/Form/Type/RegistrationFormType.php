<?php
/*
 *  OrehaERP - allan.irdel
 *  RegistrationFormType.php - UTF-8
 */

namespace Oreha\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        
        // CHAMPS SUPPLEMENTAIRES
        $builder->add('fullName', null, array('label' => 'Nom complet'));
        parent::buildForm($builder, $options);

    }
            
    public function getName(){
        return 'oreha_user_registration';
    }
}