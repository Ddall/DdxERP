<?php
/*
 *  OrehaERP - allan.irdel
 *  CourrierController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Oreha\ErpBundle\Entity\Courrier;
use Oreha\ErpBundle\Form\CourrierType;

class CourrierController extends Controller{
    // ADMIN ACTIONS
    
    /**
     * Index
     * @return type
     */
    public function listAction(){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Courrier');
        $courriers = $repo->findAll();
        
        return $this->render('OrehaErpBundle:Courrier:list.html.twig', array(
           'courriers' => $courriers
        ));
    }
    
    /**
     * Ajoute un modèle de courrier
     * @return view
     */
    public function ajouterAction(){
        $courrier = new Courrier();
        $formCourrier = $this->createForm(new CourrierType(), $courrier);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST' ){
            $formCourrier->bind($request);
            
            if($formCourrier->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($courrier);
                $em->flush();
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_bundle_courrier'));
        }
        
        return $this->render('OrehaErpBundle:Courrier:ajouter.html.twig', array(
            'formCourrier' => $formCourrier->createView()
        ));
    }
    
    
    public function modifierAction($id){
        $courrier = $this->getCourrier($id);
        $formCourrier = $this->createForm(new CourrierType, $courrier);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formCourrier->bind($courrier);
            
            if($formCourrier->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($courrier);
                $em->flush();
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_bundle_courrier_modifier'));
            
        }
        
        
        return $this->render('OrehaErpBundle:Courrier:ajouter.html.twig', array(
            'formCourrier' => $formCourrier->createView()
        ));
    }
    
    public function voirAction($id){
        $courrier = $this->getCourrier($id);
        
        return $this->render('OrehaErpBundle:Courrier:voir.html.twig', array(
            'courrier'=> $courrier
            ));
        
    }
        
    
    
    // PUBLIC ACTIONS
    
    
    // TOOLS
    private function makePdf($idDossier, $idCourrier){
        
    }
            
    private function getCourrier($id){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Courrier');
        $courrier = $repo->find($id);
        
        if(!is_object($courrier) || !($courrier instanceof Courrier)){
            throw $this->createNotFoundException('id courrier invalide');
        }

        return $courrier;
    }
}
