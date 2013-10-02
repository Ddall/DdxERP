<?php
/**
 * Description of SourceController
 *
 * @author allan.irdel
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Oreha\ErpBundle\Entity\Source;
use Oreha\ErpBundle\Form\SourceType;


class SourceController extends Controller {
    
    /**
     * 
     * @return view
     */
    public function listeAction(){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Source');
        $sources = $repo->findAll();
        
        return $this->render('OrehaErpBundle:Source:list.html.twig', array(
           'sources' => $sources
        ));
    }
    
    
    /**
     * Ajouter une source
     * @return view
     */
    public function ajouterSourceAction(){
        $source = new Source();
        $formSource = $this->createForm(new SourceType, $source);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formSource->bind($request);
            
            if($formSource->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($source);
                $em->flush();
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_source'));
        }
        
        return $this->render('OrehaErpBundle:Source:new.html.twig', array(
           'formSource' => $formSource->createView()
        ));
    }
    
    /**
     * Afficher une source
     * @param integer $id
     * @return view
     */
    public function voirAction($id){
        $source = $this->getSource($id);
        
        return $this->render('OrehaErpBundle:Source:voir.html.twig', array(
            'source' => $source
        ));
    }
    
    
    public function voirSourceAction($id){
        $source = $this->getSource($id);
        
        return $this->render('OrehaErpBundle:Source:voir.html.twig', array(
            'source' => $source
        ));
    }
    
    public function modifierSourceAction($id){
        $source = $this->getSource($id);
        $formSource = $this->createForm(new SourceType(), $source);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formSource->bind($request);
            
            if($formSource->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($source);
                $em->flush();
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_source_voir', array(
                'id' => $source->getId()
            )) );
        }
        
        return $this->render('OrehaErpBundle:Source:modifier.html.twig', array(
            'formSource'=> $formSource->createView()
        ));
    }
    
    
    //////////// FONCTIONS UTILES
    /**
     * 
     * @param integer $id
     * @return \Oreha\ErpBundle\Entity\Source
     * @throws notfoundexception
     */
    private function getSource($id){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Source');
        $source = $repo->find($id);
        
        if(!is_object($source) || !($source instanceof Source)){
            throw $this->createNotFoundException('id source invalide');
        }
            
        return $source;
    }
    
}

