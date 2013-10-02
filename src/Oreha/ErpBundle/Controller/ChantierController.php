<?php
/*
 *  OrehaERP - allan.irdel
 *  DemoController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Oreha\ErpBundle\Entity\Chantier;

class ChantierController extends Controller {
    
    public function indexAction(){
        $listeChantiers = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Chantier')-> findAll();
        
        return $this->render('OrehaErpBundle:Chantier:list.html.twig', array(
            'listeChantiers' => $listeChantiers
        ));
    }
    
    public function ajouterCommentaireAction($id){
        $chantier  = $this->getChantier($id);
        
        $commentaire = new Commentaire();
        $formCommentaire = $this->createForm(new CommentaireType(), $commentaire);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formCommentaire->bind($request);
            
            if($formCommentaire->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($chantier);
                $em->persist($commentaire);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_chantier_voir'));
        }
        
        return $this->render('OrehaErpBundle:Chantier:ajouterCommentaire.html.twig', array(
           'formCommentaire' => $formCommentaire->createView(),
        ));
    }
    
    public function modifierCommentaireAction($id, $idChantier){
        $chantier = $this->getChantier($idChantier);
        $commentaire = $this->getCommentaire($id);
        
        $formCommentaire = $this->createForm(new CommentaireType(), $commentaire);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formCommentaire->bind($request);
            
            if($formCommentaire->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($chantier);
                $em->persist($commentaire);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_chantier_voir', array('id' => $chantier->getId())));
        }
        
        return $this->render('OrehaErpBundle:Chantier:ajouterCommentaire.html.twig', array(
           'formCommentaire' => $formCommentaire->createView(),
        ));
        
    }
    
    public function supprimerCommentaireAction($id, $idChantier){
        $commentaire = $this->getCommentaire($id);
        $chantier = $this->getChantier($idChantier);
        
        $em = $this->getDoctrine()->getManager();
        
        $chantier->removeCommentaire($commentaire);
        
        $em->remove($commentaire);
        $em->persist($chantier);
        $em->flush();
        
        return $this->redirect($this->generateUrl('oreha_erp_chantier_voir', array(
            'id' => $chantier->getId()
        )));
    }
    
    // --- TOOLS

    /**
     * @param integer $id
     * @return \Oreha\ErpBundle\Entity\Chantier
     */
    private function getChantier($id){
        $chantier = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Chantier');
        
        if(!is_object($chantier) || !($chantier instanceof Chantier)){
            throw $this->createNotFoundException('id chantier invalide');
        }
        
        return $chantier;
    }
    
    private function getCommentaire($id){
        $commentaire = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Commentaire')->find($id);
        
        if(!is_object($commentaire) || !($commentaire instanceof Commentaire)){
            throw $this->createNotFoundException('id commentaire invalide');
        }
        
        return $commentaire;
    }
    
    /**
     * @return EntityManager
     */
    private function getEntityManager(){
        return $this->getDoctrine()->getManager();
    }
}