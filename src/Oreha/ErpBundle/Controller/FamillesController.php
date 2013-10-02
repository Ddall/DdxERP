<?php
/*
 *  OrehaERP - allan.irdel
 *  FamilleController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use JMS\SecurityExtraBundle\Annotation\Secure;

use Oreha\ErpBundle\Entity\FamillePrestation;
use Oreha\ErpBundle\Form\FamillePrestationType;

use Oreha\ErpBundle\Entity\FamilleDeclaration;
use Oreha\ErpBundle\Form\FamilleDeclarationType;

class FamillesController extends Controller{
    // PRESTATIONS
    
    public function listeFamillesPrestationAction(){
        $liste = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:FamillePrestation')->findAll();
        
        return $this->render('OrehaErpBundle:FamillePrestation:liste.html.twig', array(
            'listeFamillesPrestation' =>$liste
        ));
    }
    
    public function voirFamillePrestationAction($id){
        $famille = $this->getFamillePrestation($id);
        
        return $this->render('OrehaErpBundle:FamillePrestation:voir.html.twig', array(
            'famille' => $famille
        ));
    }
    
    public function ajouterFamillePrestationAction(){
        $famille = new FamillePrestation();
        $formFamille = $this->createForm(new FamillePrestationType, $famille);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            
            $formFamille->bind($request);
            
            if($formFamille->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($famille);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_admin_famille_prestation'));
        }
        return $this->render('OrehaErpBundle:FamillePrestation:new.html.twig', array(
            'formFamille' => $formFamille->createView()
        ));
    }
    
    
    public function modifierFamillePrestationAction($id){
        $famille = $this->getFamillePrestation($id);
        
        $formFamille = $this->createForm(new FamillePrestationType, $famille);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            
            $formFamille->bind($request);
            
            if($formFamille->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($famille);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('oreha_admin_famille_prestation'));
        }
        return $this->render('OrehaErpBundle:FamillePrestation:new.html.twig', array(
            'formFamille' => $formFamille->createView()
        ));
    }
    
    // ------------- FAMILLE DECLARATION
    public function listeFamillesDeclarationAction(){
        $liste = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:FamilleDeclaration')->findAll();
        
        return $this->render('OrehaErpBundle:FamilleDeclaration:liste.html.twig', array(
            'listeFamillesDeclaration' =>$liste
        ));
    }
    
    public function voirFamilleDeclarationAction($id){
        $famille = $this->getFamilleDeclaration($id);
        
        return $this->render('OrehaErpBundle:FamilleDeclaration:voir.html.twig', array(
            'famille' => $famille
        ));
    }
    
    public function ajouterFamilleDeclarationAction(){
        $famille = new FamilleDeclaration();
        $formFamille = $this->createForm(new FamilleDeclarationType, $famille);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            
            $formFamille->bind($request);
            
            if($formFamille->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($famille);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_admin_famille_declaration'));
        }
        return $this->render('OrehaErpBundle:FamilleDeclaration:new.html.twig', array(
            'formFamille' => $formFamille->createView()
        ));
    }
    
    
    public function modifierFamilleDeclarationAction($id){
        $famille = $this->getFamilleDeclaration($id);
        
        $formFamille = $this->createForm(new FamilleDeclarationType, $famille);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            
            $formFamille->bind($request);
            
            if($formFamille->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($famille);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('oreha_admin_famille_declaration'));
        }
        return $this->render('OrehaErpBundle:FamilleDeclaration:new.html.twig', array(
            'formFamille' => $formFamille->createView()
        ));
    }
    
    
    // TOOLS 
    private function getFamillePrestation($id){
        $famille = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:FamillePrestation')->find($id);
        
        if(!is_object($famille) || !($famille instanceof FamillePrestation)){
            throw $this->createNotFoundException('id Famille invalide');
        }
        
        return $famille;
    }
    
    public function getFamilleDeclaration($id){
        $famille = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:FamilleDeclaration')->find($id);
        
        if(!is_object($famille) || !($famille instanceof FamilleDeclaration)){
            throw $this->createNotFoundException('id Famille invalide');
        }
        
        return $famille;
    }
    
    
};