<?php
/*
 *  OrehaERP - allan.irdel
 *  GroupeController.php - UTF-8
 */

namespace Oreha\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Oreha\UserBundle\Entity\Group;


class GroupeController  extends Controller{
    // TOOLS
    private function getGroupe($id){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaUserBundle:Group');
        $group = $repo->find($id);
        
        if(!is_object($group) || !($group instanceof \Oreha\UserBundle\Entity\Group)){
            throw $this->createNotFoundException('id groupe invalide');
        }
        
        return $group;
    }
    
    /**
     * 
     * @return type
     */
    private function getRoles(){
        return array(
                'ROLE_ADMINISTATEUR',
                'ROLE_MANAGER',
                'ROLE_GESTION_USERS',
                'ROLE_ADMINISTRATIF',
                'ROLE_COMMERCIAL',
                'ROLE_BE',
                'ROLE_CHANTIER',
                'ROLE_FACTURATION',
                'ROLE_SUPER_ADMIN'
            );
    }
    
    /**
     * Affiche les groupes
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaUserBundle:Group');
        $groups = $repo->findAll();
        
        return $this->render('OrehaUserBundle:Groupe:list.html.twig', array(
            'groupes' => $groups
        ));
    }
    
    public function ajouterAction(){
        
        $fb = $this->createFormBuilder();
        $fb
            ->add('name', 'text', array(
                'required' => true,
                'label' => 'Nom'
            ))
            ->add('roles', 'choice', array(
                'required' => false,
                'multiple' => true,
                'choices' => $this->getRoles()
            ))
        ;
        
        $formGroupe = $fb->getForm();
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formGroupe->bind($request);
            
            if($formGroupe->isValid()){
                $data = $formGroupe->getData();
                
                $em = $this->getDoctrine()->getManager();
                $groupe = new Group($data['name']);
                $r = $this->getRoles();
                
                foreach($data['roles'] AS $role){
                    
                    $groupe->addRole( $r[$role]);
                }
                
                $em->persist($groupe);
                $em->flush();
                
                $em->refresh($groupe);
                
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_admin_group_voir', array(
                'id' => $groupe->getId()
            )) );

        }
        
        return $this->render('OrehaUserBundle:Groupe:new.html.twig', array(
            'formGroupe' => $formGroupe->createView()
        ));
    }
    
    /**
     * Modifier un groupe
     * @param integer $id
     * @return view
     */
    public function modifierAction($id){
        $groupe= $this->getGroupe($id);
                
        $fb = $this->createFormBuilder();
        $fb     
            ->add('roles', 'choice', array(
                'required' => false,
                'multiple' => true,
                'choices' => $this->getRoles()
            ));
        
        
        
        $formGroupe = $fb->getForm();
        
        $request =$this->getRequest();
        if(strtoupper($request->getMethod()) =='POST'){
            $formGroupe->bind($request);
            
            if($formGroupe->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $data = $formGroupe->getData();
                
                foreach($groupe->getRoles() as $aRole){
                    $groupe->removeRole($aRole);
                }
                $r = $this->getRoles();
                foreach($data['roles'] AS $role){
                    $groupe->addRole( $r[$role]);
                }
                
                $em->persist($groupe);
                $em->flush();
                $em->refresh($groupe);
                
            }
           
            return $this->redirect($this->generateUrl('oreha_erp_admin_group_voir', array(
                'id' => $groupe->getId()
            )));
        };
        
        return $this->render('OrehaUserBundle:Groupe:modifier.html.twig', array(
            'groupe' => $groupe,
            'formGroupe' => $formGroupe->createView()
        ));
    }
    
//    /**
//     * @return view
//     */
//    public function addRolesAction(){
//        $em = $this->getDoctrine()->getManager();
//        $groups = new \Doctrine\Common\Collections\ArrayCollection;
//        
//        $superadministrateur= new Group('Super Administrateurs');
////        $superadministrateur->setName('');
//        $superadministrateur->addRole('ROLE_SUPER_ADMIN');
//        $groups->add($superadministrateur);
//
//        
//        foreach($groups AS $group){
//            $em->persist($group);
//        }
//        $em->flush();
//        
//        
//        
//        return $this->render('OrehaErpBundle::debug.html.twig', array(
//            'data' => '$data'
//        ));
//        
//    }
    
    /**
     * Affiche un groupe
     * @param integer $id
     * @return view
     */
    public function voirAction($id){
        $groupe = $this->getGroupe($id);
                
        return $this->render('OrehaUserBundle:Groupe:voir.html.twig', array(
           'groupe' => $groupe,
        ));
    }
}