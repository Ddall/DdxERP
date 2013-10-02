<?php
## CLIENTCONTROLLER.PHP

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Oreha\ErpBundle\Entity\Client;

use Oreha\ErpBundle\Entity\Commentaire;
use Oreha\ErpBundle\Form\CommentaireType;

use Oreha\ErpBundle\Entity\Chantier;
use Oreha\ErpBundle\Form\ChantierType;

class ClientController extends Controller{
    public function indexAction(){
        $clients = $this->getClients();
       
        return $this->render('OrehaErpBundle:Client:list.html.twig', array(
           'listeClients' => $clients
        ));
    }
    
    /**
     * @param integer $id
     */
    public function voirAction($id){
        $client = $this->getClient($id);
        
        $commentaire = new Commentaire;
        $formCommentaire = $this->createForm(new CommentaireType, $commentaire);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())=='POST'){
            $formCommentaire->bind($request);

            // THIS THING JUST WONT VALIDATE
//            if($formCommentaire->isValid()){
                $dossier = $client->getDossier();
                $dossier->addCommentaire($commentaire);
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($commentaire);
                $em->persist($dossier);
                $em->flush();
                
//            }
            
            return $this->redirect($this->generateUrl('oreha_erp_client_voir', array(
                'id' => $client->getId()
            )));
        }
        
        return $this->render('OrehaErpBundle:Client:voir.html.twig', array(
            'client' => $client,
            'dossier' => $client->getDossier(),
            'formCommentaire' => $formCommentaire->createView()
        ));
    }
    
    
    
    // ------------- CHANTIER
     
    public function createChantierAction($id){
        $client = $this->getClient($id);
        
        $chantier = new Chantier;
        $chantier->setClient();
        $formChantier = $this->createForm(new ChantierType, $chantier);
        
//        $intervenant = new Intervenant;
//        $intervenant->setChantier($chantier);
//        $formIntervenant = $this->createForm(new IntervenantType, $intervenant);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formChantier->bind($request);
//            $formIntervenant->bind($request);
            
            if($formChantier->isValid()){
                $em =$this->getDoctrine()->getManager();
                
                $chantier->setClient($client);
                $client->setChantier($chantier);
//                $intervenant->setChantier($chantier);
                
//                $em->persist($intervenant);
                $em->persist($chantier);
                $em->persist($client);
                
                $em->flush();
                $em->refresh($chantier);
                return $this->redirect($this->generateUrl('oreha_erp_chantier_voir', array(
                    'id' => $chantier->getId()
                )));
            }
            
        }
        
            return $this->render('OrehaErpBundle:Chantier:new.html.twig', array(
                'formChantier' => $formChantier->createView(),
                'client' => $client
            ));
    }
    
    
    
    // ------------- HELPERS
    
    /**
     * @return Collection
     */
    private function getClients(){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Client');
        $clients = $repo->findAll();
        
        return $clients;
    }
    
    /**
     * @param integer $id
     * @return \Oreha\ErpBundle\Entity\Client
     * @throws notfoundexception
     */
    private function getClient($id){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Client');
        
        $client = $repo->find($id);
        
        if(!is_object($client) || !($client instanceof Client)){
            throw $this->createNotFoundException('id client invalide');
        }
        
        return $client;
    }
    
    
    
}
