<?php
/*
 *  OrehaERP - allan.irdel
 *  FamilleController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Oreha\ErpBundle\Entity\FamilleCEE;
Use Oreha\ErpBundle\Form\FamilleCEEType;


class FamilleCEEController extends Controller{
    
    /**
     * @Secure(roles="ROLE_ADMINISTATEUR")
     */
    public function listeAction(){
        $listeFamilles = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:FamilleCEE')->findAll();
        
        return $this->render('OrehaErpBundle:FamilleCEE:list.html.twig', array(
            'listeFamilles' => $listeFamilles
        ));
    }
    
    
    /**
     * @Secure(roles="ROLE_ADMINISTATEUR")
     */
    public function ajouterFamilleAction(){
        $famille = new FamilleCEE();
        $formFamille = $this->createForm(new FamilleCEEType, $famille);
        
        $request = $this->getRequest();
        
        if(strtoupper($request->getMethod()) == 'POST'){
            $formFamille->bind($request);
            
            if($formFamille->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($famille);
                $em->flush();
            }
            
            return $this->redirect( $this->generateUrl('oreha_admin_famille_cee'));
        }
        
        return $this->render('OrehaErpBundle:FamilleCEE:new.html.twig', array(
            'formFamille' => $formFamille->createView()
        ));
    }
    
    /**
     * @Secure(roles="ROLE_ADMINISTATEUR")
     * @param integer $id
     */
    public function voirFamilleAction($id){
        return $this->render('OrehaErpBundle:FamilleCEE:voir.html.twig', array(
            'famille' => $this->getFamilleCEE($id)
        ));
    }
    
    /**
     * @Secure(roles="ROLE_ADMINISTATEUR")
     * @param integer $id
     * @return view
     */
    public function modifierFamilleAction($id){
        $famille = $this->getFamilleCEE($id);
        $formFamille = $this->createForm(new FamilleCEEType(), $famille);
        
        $request = $this->getRequest();
        
        if(strtoupper($request->getMethod()) == 'POST'){
            $formFamille->bind($request);
            
            if($formFamille->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($famille);
                $em->flush();
            }
            
            return $this->redirect( $this->generateUrl('oreha_admin_famille_cee'));
        }
        
        return $this->render('OrehaErpBundle:FamilleCEE:new.html.twig', array(
            'formFamille' => $formFamille->createView()
        ));
        
    }
    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     * TAKE A SECOND TO REFLECT ON WHAT YOU ARE DOING BEFORE USING THIS...
     * @param type $id
     */
    public function supprimerFamilleAction($id){
        $famille = $this->getFamilleCEE($id);
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($famille);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_admin_famille_cee'));
       
    }


    // TOOLS
    /**
     * @param integer $id
     * @return \Oreha\ErpBundle\Entity\FamilleCEE
     * @throws GUESSWHAT
     */
    private function getFamilleCEE($id){
        $famille = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:FamilleCEE')->find($id);
        
        if(!is_object($famille) || !($famille instanceof \Oreha\ErpBundle\Entity\FamilleCEE)){
            throw $this->createNotFoundException('famille CEE invalide');
        }
        
        return $famille;
    }
}

