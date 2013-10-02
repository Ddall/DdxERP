<?php
/*
 *  OrehaERP - allan.irdel
 *  ContactController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Oreha\ErpBundle\Entity\Contact;
use Oreha\ErpBundle\Form\ContactType;
use Oreha\ErpBundle\Entity\Email;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller{
    /**
     * Affiche la liste des contacts.
     * @return view
     */
    public function indexAction(){
        $repository = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact');
        $listeContacts = $repository->findAll();
        
        return $this->render('OrehaErpBundle:Contact:list.html.twig', 
                array('listeContacts' => $listeContacts)
            );
    }
    
    /**
     * Affiche la fiche d'un contact.
     * @param type $id identifiant contact \d+
     * @return view
     */
    public function voirAction($id){
        $contactsRepo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact');
        $contact = $contactsRepo->find($id);
        
        if(!is_object($contact)){
            throw $this->createNotFoundException('ce contact n\'existe pas');
        }
        
        // Formulaires vides pour l'affichage
        $email = new \Oreha\ErpBundle\Entity\Email;
        $formEmail= $this->createForm(new \Oreha\ErpBundle\Form\EmailType, $email);
        
        $telephone = new \Oreha\ErpBundle\Entity\Telephone;
        $formTelephone = $this->createForm(new \Oreha\ErpBundle\Form\TelephoneType, $telephone);

        return $this->render('OrehaErpBundle:Contact:voir.html.twig', 
                array('contact'=>$contact,
                      'formEmail'=>$formEmail->createView(),
                      'formTelephone'=> $formTelephone->createView()
                ));
    }
    
    /**
     * Ajoute un contact.
     * @return view
     */
    public function newAction(){
        $contact = new Contact();
        $formContact = $this->createForm(new ContactType, $contact);
        
//        Traite les données entrantes 
        $request = $this->get('request');
        if(strtoupper( $request->getMethod() ) == 'POST'){
            $formContact->bind($request);
            
            if($formContact->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();
                
                $em->refresh($contact);
                return $this->redirect($this->generateUrl('oreha_erp_contact_voir', array('id'=> $contact->getId() )));
            }
        }
        
        return $this->render('OrehaErpBundle:Contact:new.html.twig', array(
            'formContact'=> $formContact->createView()
        ));
    }
    
    /**
     * Ajoute un email à un contact: POST obligatoire.
     * @param type $id identifiant contact
     * @return redirect -> 
     * @throws \Doctrine\ORM\NoResultException
     */
    public function ajouterEmailAction($id){
        $request = $this->getRequest();

        $repository = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact');
        $contact = $repository->find($id);
        
        if(!is_object($contact) || !($contact instanceof Contact)){
            throw new \Doctrine\ORM\NoResultException('id contact invalide');
        }
        
        if(strtoupper($request->getMethod()) == 'POST' ){
            $email = new Email();
            $email->setContact($contact);
            $formEmail = $this->createForm(new \Oreha\ErpBundle\Form\EmailType(), $email);
            
            $formEmail->bind($request);
            
            
//            if($formEmail->isValid()){ // TODO VALIDER LES DONNEES!!!!!!
                $contact->addEmail($email);
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->persist($email);
                $em->flush();

                return $this->redirect($this->generateUrl('oreha_erp_contact_voir', array('id'=>$id)));
//            }
            
        }else{
            return $this->redirect($this->generateUrl('oreha_erp_contact'));
        }
    }
    
    /**
     * Ajoute un numéro de telephone et son libelle dans la fiche d'un contact
     * @param type $id
     */
    public function ajouterTelephoneAction($id){
        $request = $this->getRequest();
        
        $repository = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact');
        $contact = $repository->find($id);
        
        if(!is_object($contact) || !($contact instanceof Contact)){
            throw new \Doctrine\ORM\NoResultException('id contact invalide');
        }
        
        if(strtoupper($request->getMethod()) == 'POST' ){
            $telephone = new \Oreha\ErpBundle\Entity\Telephone;
            $telephone->setContact($contact);
            
            $formTelephone = $this->createForm( new \Oreha\ErpBundle\Form\TelephoneType, $telephone);
            $formTelephone->bind($request);
            
//            if($formTelephone->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->persist($telephone);
                $em->flush();
//            }
            
        }
        
        return $this->redirect($this->generateUrl('oreha_erp_contact_voir', array('id'=>$id)));
        
    }
    
    /**
     * 
     */
    public function supprimeTelephoneAction($idContact, $id){
        $em  = $this->getDoctrine()->getManager();
        
        $tel = $em->getRepository('OrehaErpBundle:Telephone')->find($id);
        $contact = $em->getRepository('OrehaErpBundle:Contact')->find($idContact);
                
        if(!is_object($tel)){
            throw $this->createNotFoundException('id telephone invalide');
        }
        
        if(!is_object($contact)){
            throw $this->createNotFoundException('id contact invalide');
        }
        
        $contact->removeTelephone($tel);
        $em->remove($tel);
        $em->persist($contact);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_contact_voir', array('id' => $idContact)));
    }
    
    /**
     * Supprime un email d'une fiche contact
     * @param type $idContact
     * @param type $id
     * @return type
     */
    public function supprimeEmailAction($idContact, $id){
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('OrehaErpBundle:Contact')->find($idContact);

        $repEmail = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Email');
        $email = $repEmail->find($id);
        
        
        if(!is_object($email)){
            throw $this->createNotFoundException('id email inexistant ou invalide'); 
        }
        if(!is_object($contact)){
            throw $this->createNotFoundException('id contact invalide');
        }
        
        $contact->removeEmail($email);
        $em->remove($email);
        $em->persist($contact);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_contact_voir', array('id' => $idContact)));
    }
    
    /**
     * Supprime un contact // Confirme la suppression d'un contact
     * @param type $id identifiant contact
     * @throws NotFoundHttpException
     */
    public function supprimeContactAction($id){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact');
        $contact = $repo->find($id);
        
        if(!is_object($contact) || !($contact instanceof Contact)){
            return $this->createNotFoundException('id contact invalide');
        }
        
        $dossier = $contact->getDossier();
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($contact);
        $em->flush();
            

        return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array(
            'id' => $dossier->getId()
        )));
    }
    
    public function modifierAction($id){
        $repository = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact');
        $contact = $repository->find($id);
        
        $request = $this->getRequest();
        if(!is_object($contact) || !($contact instanceof Contact)){
            throw $this->createNotFoundException('id contact invalide');
        }

        $form = $this->createForm(new ContactType, $contact);

        if(strtoupper($request->getMethod()) == 'POST'){
            $form->bind($request);
            
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();
            }

            return $this->redirect( $this->generateUrl('oreha_erp_contact_voir', array('id'=> $id)) );
        }
        
        return $this->render('OrehaErpBundle:Contact:edit.html.twig', array(
            'contact' => $contact,
            'formContact' => $form->createView()
        ));
        
    }
    
    public function rechercherAction(){
//        $repository = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact');
        $data=null;
        
        return $this->render('OrehaErpBundle::debug.html.twig', array(
            'data' => $data
        ));
    }
}