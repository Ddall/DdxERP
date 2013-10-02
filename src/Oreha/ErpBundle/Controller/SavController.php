<?php

/*
 *  OrehaERP - allan.irdel
 *  SavController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Oreha\ErpBundle\Entity\TicketSAV;
use Oreha\ErpBundle\Form\TicketSAVType;

use Oreha\ErpBundle\Entity\Commentaire;
use Oreha\ErpBundle\Form\CommentaireType;


class SavController extends Controller{

    public function indexAction(){
        $tickets = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:TicketSAV')->findAll();
        
        return $this->render('OrehaErpBundle:TicketSAV:list.html.twig', array(
           'listeTickets' => $tickets
        ));
    }
    
    /**
     * @param integer $id
     * @return view
     */
    public function voirAction($id){
        $ticket = $this->getTicket($id);
        
        $commentaire = new Commentaire();
        $formCommentaire = $this->createForm(new CommentaireType, $commentaire);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())=='POST'){
            
            $formCommentaire->bind($request);
            if($formCommentaire->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $ticket->addCommentaire($commentaire);
                $em->persist($commentaire);
                $em->persist($ticket);
                
                $em->flush();
            }
        }
        
        return $this->render('OrehaErpBundle:TicketSAV:voir.html.twig', array(
            'ticket'  => $ticket,
            'formCommentaire' => $formCommentaire->createView()
        ));
    }
    
    /**
     * 
     */
    public function ouvertureTicketAction($id){
        $client = $this->getClient($id);
        
        
        $ticket = new TicketSAV;
        $ticket->setClient($client);
        $formTicket = $this->createForm(new TicketSAVType, $ticket);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())=='POST'){
            $formTicket->bind($request);
            
            if($formTicket->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $client->addTicket($ticket);
                $em->persist($ticket);
                $em->persist($client);
                $em->flush();
                
                $em->refresh($ticket);
                
                return $this->redirect($this->generateUrl('oreha_erp_sav_voir', array(
                    'id' => $ticket->getId()
                )));
                
            }

        }
        
        return $this->render('OrehaErpBundle:TicketSAV:new.html.twig', array(
            'formTicket' => $formTicket->createView(),
            'client' => $client
        ));
    }

    /**
     * 
     */
    public function modifierTicketAction($id){
        $ticket = $this->getTicket($id);
        $formTicket = $this->createForm(new TicketSAVType, $ticket);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())=='POST'){
            $formTicket->bind($request);
            
            if($formTicket->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($ticket);
                $em->flush();
                
                $em->refresh($ticket);
                
                return $this->redirect($this->generateUrl('oreha_erp_sav_voir', array(
                    'id' => $ticket->getId()
                )));
                
            }
        }
        
        return $this->render('OrehaErpBundle:TicketSAV:edit.html.twig', array(
            'formTicket' => $formTicket->createView(),
            'client' => $ticket->getClient()
        ));
    }
    
    public function ajouterCommentaireAction($id){
        $ticket = $this->getTicket($id);
        
        $commentaire = new Commentaire();
        $formCommentaire = $this->createForm(new CommentaireType, $commentaire);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())=='POST'){
            
            $formCommentaire->bind($request);
            if($formCommentaire->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $ticket->addCommentaire($commentaire);
                $em->persist($commentaire);
                $em->persist($ticket);
                
                $em->flush();
                
            }
            return $this->redirect($this->generateUrl('oreha_erp_ticket_voir', array(
                'id' => $ticket->getId()
            )));
        }
        
        return $this->render('OrehaErpBundle:TicketSAV:ajouterCommentaire.html.twig', array(
            'formCommentaire' => $formCommentaire->createView()
                
        ));
    }
    
    
    public function modifierCommentaireAction($id, $idTicket){
        $commentaire = $this->getCommentaire($id);
        $ticket = $this->getTicket($idTicket);
        
        $formCommentaire = $this->createForm(new CommentaireType, $commentaire);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())=='POST'){
            
            $formCommentaire->bind($request);
            if($formCommentaire->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($commentaire);
                
                $em->flush();
                
            }
            return $this->redirect($this->generateUrl('oreha_erp_ticket_voir', array(
                'id' => $ticket->getId()
            )));
        }
        
        return $this->render('OrehaErpBundle:TicketSAV:editerCommentaire.html.twig', array(
            'formCommentaire' => $formCommentaire->createView(),
            'ticket' => $ticket
                
        ));
        
    }
    
    public function supprimerCommentaireAction($id, $idTicket){
        $commentaire = $this->getCommentaire($id);
        $ticket = $this->getTicket($idTicket);
        
        $em = $this->getDoctrine()->getManager();
        $ticket->removeCommentaire($commentaire);
        $em->persist($ticket);
        $em->remove($commentaire);
        $em->flush();
        
        return $this->redirect($this->generateUrl('oreha_erp_sav_voir', array(
            'id' => $ticket->getId()
        )));
    }
    
    // -- HELPERS
    private function getTicket($id){
        $ticket = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:TicketSAV')->find($id);
        
        if(!is_object($ticket) || !($ticket instanceof TicketSAV)){
            throw $this->createNotFoundException('id ticket invalide');
        }
        return $ticket;
    }
    
    private function getClient($id){
        $client = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Client')->find($id);
        
        if(!is_object($client) || !($client instanceof \Oreha\ErpBundle\Entity\Client)){
            throw $this->createNotFoundException('id client invalide');
        }
        return $client;
    }
    
    private function getCommentaire($id){
        $commentaire = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Commentaire')->find($id);
        
        if(!is_object($commentaire) || !($commentaire instanceof Commentaire)){
            throw $this->createNotFoundException('id commentaire invalide');
        }
        return $commentaire;
        
    }
}