<?php
/*
 *  OrehaERP - allan.irdel
 *  DossierController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;

use Oreha\ErpBundle\Entity\Dossier;
use Oreha\ErpBundle\Form\DossierType;

use Oreha\ErpBundle\Entity\Contact;
use Oreha\ErpBundle\Form\ContactType;

use Oreha\ErpBundle\Entity\Email;
use Oreha\ErpBundle\Form\EmailType;

use Oreha\ErpBundle\Entity\Telephone;
use Oreha\ErpBundle\Form\TelephoneType;

use Oreha\ErpBundle\Entity\Bien;
use Oreha\ErpBundle\Form\BienType;

use Oreha\ErpBundle\Entity\Statut;
use Oreha\ErpBundle\Form\StatutType;

use Oreha\ErpBundle\Entity\Rendezvous;
//use Oreha\ErpBundle\Form\RendezvousType;

use Oreha\ErpBundle\Entity\Commentaire;
use Oreha\ErpBundle\Form\CommentaireType;

use Oreha\ErpBundle\Entity\Echeance;
use Oreha\ErpBundle\Form\EcheanceType;

use Oreha\ErpBundle\Entity\Pret;
use Oreha\ErpBundle\Form\PretType;

use Oreha\ErpBundle\Entity\Devis;
use Oreha\ErpBundle\Form\DevisType;

use Oreha\ErpBundle\Entity\CEE;
use Oreha\ErpBundle\Form\CEEType;

use Oreha\ErpBundle\Entity\Prestation;
use Oreha\ErpBundle\Form\PrestationType;

use Oreha\ErpBundle\Entity\DeclarationAdministrative;
use Oreha\ErpBundle\Form\DeclarationAdministrativeType;

use Oreha\ErpBundle\Entity\Client;

use Oreha\ErpBundle\Entity\Facture;
use Oreha\ErpBundle\Form\FactureType;

use Oreha\ErpBundle\Entity\Payement;
use Oreha\ErpBundle\Form\PayementType;

class DossierController extends Controller{
    
    /**
     * 
     * @return view
     */
    public function indexAction(){
        $repository = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Dossier');
        $listeDossier = $repository->findDossiers();
        
        
//        $listeDossier = $repository->findTest();
        
//        $listeDossier = array_reverse($listeDossier, true);
        
        return $this->render('OrehaErpBundle:Dossier:list.html.twig', array(
            'listeDossiers' => $listeDossier
        ));
    }
    
    /**
     * Ajouter un dossier
     */
    public function ajouterAction(){

        $contact = new Contact();
        $formContact = $this->createForm(new ContactType, $contact);
        
        $dossier = new Dossier();
        $formDossier = $this->createForm(new DossierType(), $dossier);
        
        $telPortable = new Telephone();
        $formTelPort = $this->createForm(new TelephoneType(), $telPortable);
        
        $email = new Email();
        $formEmail = $this->createForm(new EmailType(), $email);
        
        // Traite les données entrantes
        $request = $this->getRequest();
        if(strtoupper($request->getMethod() ) == 'POST' ){
            $formDossier->bind($request);
            $formContact->bind($request);
            $formTelPort->bind($request);
            $formEmail->bind($request);
            
            if($formDossier->isValid() && $formContact->isValid() && $formTelPort->isValid() && $formEmail->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $telPortable->setContact($contact);
                $email->setContact($contact);
                
                $em->persist($contact);
                $em->persist($telPortable);
                $em->persist($email);
                $em->persist($dossier);
                $em->flush();
                $em->refresh($dossier);
                
                $statut= new Statut();
                $statut->setDossier($dossier);
                $statut->setChr('S');
                $statut->setNum(0);
                $statut->setLibelle('source');
                $statut->setSuiviPar($this->getUser());
                $statut->setTransfered(new \DateTime('now'));
                $dossier->addStatut($statut);
                
                $dossier->addContact($contact);
                $em->persist($dossier);
                $em->flush();
                $em->refresh($dossier);
                

                
                return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())) );
            }
            
        }
        
        // affiche le formulaire vide
        return $this->render('OrehaErpBundle:Dossier:new.html.twig', 
                array(
                    'formDossier'=> $formDossier->createView(),
                    'formContact' => $formContact->createView(),
                    'formTelPort' => $formTelPort->createView(),
                    'formEmail' => $formEmail->createView()
                    ));
    }
    
    /**
     * 
     */
    public function ajoutRapideAction(){
        
        $dossier = new Dossier();
        $formDossier = $this->createForm(new DossierType(), $dossier);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formDossier->bind($request);
            
            if($formDossier->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $statut= new Statut();
                $statut->setDossier($dossier);
                $statut->setChr('S');
                $statut->setNum(0);
                $statut->setLibelle('source');
                $statut->setSuiviPar($this->getUser());
                $statut->setTransfered(new \DateTime('now'));
                $dossier->addStatut($statut);
                
                $em->persist($dossier);
                $em->flush();
                $em->refresh($dossier);
                
                return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId() )) );
            }
        }
        
        return $this->render('OrehaErpBundle:Dossier:newsimple.html.twig', array(
           'formDossier' => $formDossier->createView()
        ));
    }
    
    
    /**
     * Ajouter un dossier a partir d'un contact existant.
     * @param integer
     */
    public function creerDossierAvecContactAction(){
        $contact= new Contact();
        $formBuilder = $this->createFormBuilder($contact);
        
        $formBuilder->add('fullName', 'entity', array( 
            'label' => 'Contact',
            'class' => 'OrehaErpBundle:Contact',
            'property' => 'fullName'
            ));

        $formContact = $formBuilder->getForm();
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formContact->bind($contact);
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_ajouter', array('id' => $contact->getId() )) );
            
        }
        
        
        return $this->render('OrehaErpBundle:Dossier:creerAvecContactExistant.html.twig', 
                array(
                    'formSelect' => $formContact->createView()
                )
                );
    }
    
    /**
     * Modifier un dossier existant
     * @param integer $id du dossier
     * @return view
     */
    public function modifierAction($id){
        $dossier = $this->getDossier($id);
        
        $form = $this->createForm(new DossierType, $dossier);
        $request = $this->getRequest();
        
        if(strtoupper($request->getMethod() == 'POST' )){
            $form->bind($request);
             if($form->isValid()){
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($dossier);
                 $em->flush();
             }
             
             return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id' => $id)));
        }
        
        return $this->render('OrehaErpBundle:Dossier:edit.html.twig', 
                array(
                    'dossier'=> $dossier,
                    'formDossier'=> $form->createView()
                ));
    }
    
    /**
     * Affiche le dossier
     * @var integer $id
     */
    public function voirAction($id){
        $dossier = $this->getDossier($id);
        
//         SI c'est un client...
        if($dossier->getClientId()!=null){
            return $this->redirect($this->generateUrl('oreha_erp_client_voir', array(
                'id' => $dossier->getClientId()
            )));
        }
        
        $commentaire = new Commentaire();
        
        $formCommentaire = $this->createForm(new CommentaireType(), $commentaire);

        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formCommentaire->bind($request);
            
//            if( $formCommentaire->isValid() ){
                $em = $this->getDoctrine()->getManager();
                
                $dossier->addCommentaire($commentaire);
                
                $em->persist($dossier);
                $em->persist($commentaire);
                $em->flush();
//            }else{
//                die('<pre>' . print_r($commentaire));
//            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
        }
        
        return $this->render('OrehaErpBundle:Dossier:voir.html.twig', 
                array(
                    'dossier' => $dossier,
                    'formCommentaire' => $formCommentaire->createView()
        ));
    }
    
    
    // *************************** COMMENTAIRES DOSSIER ***************************
     
    /**
     * 
     * @param integer $id
     * @param integer $idDossier
     * @return view
     * @throws notfoundexception
     */
    public function editCommentaireAction($id, $idDossier){
        $dossier = $this->getDossier($idDossier);
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('OrehaErpBundle:Commentaire')->find($id);
        
        if(!$commentaire){
            throw $this->createNotFoundException('commentaire inexistant');
        }
        
        $formCommentaire = $this->createForm(new CommentaireType(), $commentaire);
        
        $request = $this->getRequest();
        
        if(strtoupper($request->getMethod())== 'POST'){
            $formCommentaire->bind($request);
            
            if($formCommentaire->isValid()){
                $em->persist($commentaire);
                $em->flush();
                
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=> $dossier->getId() )) );
            
        }
        
        return $this->render('OrehaErpBundle:Commentaire:edit.html.twig', array(
            'commentaire' => $commentaire,
            'dossier' => $dossier,
            'formCommentaire' =>$formCommentaire->createView()
        ));
    }
    
    /**
     * 
     * @param integer $id
     * @param ingeter $idDossier
     * @return view
     * @throws notfoundexception
     */
    public function deleteCommentaireAction($id, $idDossier){
        $dossier = $this->getDossier($idDossier);
        
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('OrehaErpBundle:Commentaire')->find($id);
        
        if(!$commentaire){
            throw $this->createNotFoundException('commentaire inexistant');
        }
        
        $dossier->removeCommentaire($commentaire);
        
        $em->persist($dossier);
        $em->remove($commentaire);
        $em->flush();
        
        return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array(
            'id' => $dossier->getId()
        )));
    }
    
    
    
    // *************************** CONTACTS DOSSIER ***************************
    
    ## TODO FAIRE MARCHER ajouterContactExistantAction
    /**
     * LIE UN CONTACT EXISTANT A UN CONTACT EXISTANT
     * @param integer $id 
     * @return view
     */
    public function ajouterContactExistantAction($id){
        $dossier = $this->getDossier($id);
        
        $formBuilder = $this->createFormBuilder()
            ->add('contact', 'entity', array(
            'label' => 'Contact à ajouter',
            'class' => 'OrehaErpBundle:Contact',
            'property' => 'fullName',
            'query_builder' => function(\Doctrine\ORM\EntityRepository $er){
                return $er
                        ->createQueryBuilder('c')
                        ->select('c')
                        ->where('c.dossier = :dossier')
                        ->setParameter('dossier', $dossier->getId())
                        ;
            }
                
        ));
        
        $formSelect= $formBuilder->getForm();
        
        $request = $this->getRequest();
        
        if( strtoupper($request->getMethod() ) == 'POST'){
            $formSelect->bind($request);
            
            if($formSelect->isValid()){
                $em = $this->getDoctrine()->getManager();
                                
                $contact = $request->request->get('contact');
                
                $dossier->addContact($contact);
                $em->persist($dossier);
                $em->flush();
                
            }else
            
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id' =>$dossier->getId())));
        }

        return $this->render('OrehaErpBundle:Dossier:ajouterContactExistant.html.twig', array(
            'dossier' => $dossier,
            'formSelect' => $formSelect->createView()
        ) );
        
    }


    public function ajouterContactAction($id){
        $dossier = $this->getDossier($id);
        
        $contact = new Contact();
        $contact->setDossier($dossier);
        
        $formContact = $this->createForm(new ContactType(), $contact);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST' ){
            $formContact->bind($request);
            
            if($formContact->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $dossier->addContact($contact);
                
                $em->persist($contact);
                $em->persist($dossier);
                $em->flush();
                $em->refresh($contact);
                
                
                return $this->redirect( $this->generateUrl('oreha_erp_contact_voir', array('id'=> $contact->getId())) );
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id' =>$dossier->getId())));
        }
        
        return $this->render('OrehaErpBundle:Contact:new.html.twig', array(
            'formContact'=> $formContact->createView(),
            'dossier' => $dossier
        ));
    }
    
    // *************************** BIEN DOSSIER ***************************
    
    /**
     * Ajoute un bien au dossier $id
     * @param integer $id id dossier valide
     * @return view
     * @throws notfoundexception
     */
    public function ajouterBienAction($id){
        $dossier = $this->getDossier($id);
        
        $bien = new Bien();
        $bien->setDossier($dossier);
        $formBien = $this->createForm(new \Oreha\ErpBundle\Form\BienType(), $bien);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod() ) == 'POST' ){
            $formBien->bind($request);
            
            if($formBien->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $bien->setDossier($dossier);
                $dossier->addBien($bien);
                
                $em->persist($bien);
                $em->persist($dossier);
                $em->flush();
                
                return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
            }
            
        }
        
        return $this->render('OrehaErpBundle:Bien:new.html.twig', 
                array(
                    'dossier' => $dossier,
                    'formBien' => $formBien->createView()
                ));
    }
    
    /**
     * Affiche la fiche d'un bien
     * @return view
     */
    public function voirBienAction($id){
        $bien = $this->getBien($id);
        
        return $this->render('OrehaErpBundle:Bien:voir.html.twig', 
                array(
                    'bien' => $bien,
                    'dossier' => $bien->getDossier()
                ));
        
    }

    /**
     * Modifier un bien existant
     * @param integer $id du bien
     * @return view
     */
    public function modifierBienAction($id){
        $bien = $this->getBien($id);
        $formBien = $this->createForm(new BienType, $bien);
        
        $request =$this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST' ){
            $formBien->bind($request);
            
            if($formBien->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($bien);
                $em->flush();
                
            }
            
            return $this->redirect('oreha_erp_dossier_bien_voir', array('id' => $id));
        }
        
        return $this->render('OrehaErpBundle:Bien:edit.html.twig', array(
            'formBien' => $formBien->createView(),
            'bien' => $bien
        ));
    }
    
    // *************************** STATUT DU DOSSIER ***************************
    
    /**
     * Mise à jour du statut d'un dossier
     * @param integer $id
     */
    public function ajouterStatutAction($id){
        $dossier = $this->getDossier($id); // VERIFIE SI LE DOSSIER EXISTE
        
        $statut = new Statut();
        $statut->setDossier($dossier);
        
        $formStatut = $this->createForm(new StatutType, $statut );
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())== 'POST'){
            $formStatut->bind($request);
            
            if($formStatut->isValid()){
                $em = $this->getDoctrine()->getManager();

                // CONSTRUIT LE CODE STATUT
                switch ($statut->getLibelle()){
                    case 'rendez-vous':
                        $statut->setChr('R');
                        break;
                    
                    case 'etude':
                       $statut->setChr('E');
                       break;
                }
                
                

//                $repoStatus = $em->getRepository('OrehaErpBundle:Statut');
//                
//                $ = $repoStatus->findByLibelle( $statut->getLibelle() );
//                
//                if($lastCode instanceof \Doctrine\Common\Collections\ArrayCollection){
//                    $lastC
//                    
//                    
//                }
                
                
                
                $em->persist($statut);
                $em->flush();
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
        }
        
        return $this->render('OrehaErpBundle:Statut:new.html.twig', array(
            'dossier' => $dossier,
            'formStatut' => $formStatut->createView()
        ));
        
    }
    
    /**
     * LE DOSSIER EST REMPORTE
     * @param integer $id
     */
    public function gagneAction($id){
        $dossier = $this->getDossier($id);
        
        $statut = new Statut;
        $statut->setDossier($dossier);
        $statut->setLibelle('gagne');
        $statut->setTransfered( new \DateTime('now'));
        
        $statut->setSuiviPar( $this->getUser() );
        
        $dossier->addStatut($statut);
        
        $em  = $this->getDoctrine()->getManager();
        $em->persist($statut);
        $em->persist($dossier);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
    }
    
    /**
     * LE DOSSIER EST PERDU
     * @param integer $id
     */
    public function perduAction($id){
        $dossier = $this->getDossier($id);
        
        $statut = new Statut();
        $statut->setDossier($dossier);
        $statut->setSuiviPar( $this->getUser() );
        $statut->setTransfered(new \DateTime('now'));
        
        $statut->setLibelle('perdu');
        
        $dossier->addStatut($statut);
        
        $em  = $this->getDoctrine()->getManager();
        $em->persist($statut);
        $em->persist($dossier);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
    }
    
    /**
     * LE DOSSIER EST SANS SUITES
     * @param integer $id
     */
    public function sanssuiteAction($id){
        $dossier = $this->getDossier($id);
        
        $statut = new Statut();
        $statut->setDossier($dossier);
        $statut->setSuiviPar($this->getUser());
        $statut->setLibelle('sanssuite');
        $statut->setTransfered(new \DateTime('now'));
        
        $dossier->addStatut($statut);
        
        $em  = $this->getDoctrine()->getManager();
        $em->persist($statut);
        $em->persist($dossier);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
    }
    
    /**
     * Confirme le passage du dossier en client.
     * @Secure(roles="ROLE_MANAGER")
     * @param integer $id
     */
    public function validerClientAction($id){
        $dossier = $this->getDossier($id);
        
        $client = new Client;
        $client->setDossier($dossier);
        
        
        $statut = new Statut('client', $dossier, $dossier->getResponsable() );
        $dossier->addStatut($statut);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($client);
        $em->flush();
        $em->refresh($client);
        
        // I PROPABLY SHOULDNT DO THIS BY HAND...
        $dossier->setClientId( $client->getId() );
        $em->persist($dossier);
        $em->flush();
        
        return $this->redirect($this->generateUrl('oreha_erp_client_voir', array(
            'id' =>$client->getId()
        )));

    }
    
    /**
     * Refuse le passage du dossier en client
     * @Secure(roles="ROLE_MANAGER")
     * @param integer $id
     */
    public function refuserClientAction($id){
        $statut = $this->getStatut($id);
        $dossier = $statut->getDossier($id);
        
        $dossier->removeStatut($statut);
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($statut);
        $em->persist($dossier);
        
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array(
            'id' => $dossier->getId()
        )) );
    }
    
    // *************************** RENDEZ VOUS ***************************
    
    /**
     * @param integer $id
     */
    public function ajouterRendezvousAction($id){
        $dossier = $this->getDossier($id);

        $formBuilder = $this->createFormBuilder();
        $formBuilder
                ->add('daterdv', 'datetime', array(
                    'label' => 'Selectionner une date',
                    'widget' => 'single_text',
                    'format' => 'dd/MM/yyyy HH:mm',
                    'attr' => array(
                        'class' => 'datetimepicker',
                    )
                ))
                ->add('id_contact', 'hidden', array(
                    'required' => true
                ))
                ->add('id_adresse', 'hidden', array(
                    'required' => true
                ))
//                ->add('lieu', new \Oreha\ErpBundle\Form\AdresseType, array(
//                    'required' => false,
//                    'attr' => array(
//                        'class'=> 'addr'
//                        )
//                    ))
            ;

//        $addr = new Adresse();
//        $formAddr= $this->createForm( new AdresseType(), $addr);
//        $formAddr->bind($request);
//        
        $formRdv = $formBuilder->getForm();
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())=='POST'){
            $formRdv->bind($request);
            
            if($formRdv->isValid()){
                $em = $this->getDoctrine()->getManager();
                $rdv = new Rendezvous();
                $rdv->setDossier($dossier);   
                
                $data = $formRdv->getData();
                
                $rdv->setContact( $this->getContact($data['id_contact']) );
                
                $adresse = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Adresse')->find($data['id_adresse']);
                
                if(!is_object($adresse) ){
                    throw $this->createNotFoundException('id adresse invalide: '. $data['id_adresse']);
                }
                
                if($data['id_adresse'] == -1){
                    $adr= new Adresse();
                    $rdv->setLieu( $data['lieu']);
                }else{
                    $rdv->setLieu( clone $adresse );
                }
                
                $rdv->setDate( $data['daterdv']);
                $rdv->setUser($dossier->getResponsable());
                
                $em->persist($rdv);
                $em->persist($dossier);
                $em->flush();
            }
            
           return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
        }
        
        return $this->render('OrehaErpBundle:Rendezvous:new.html.twig', array(
            'dossier' => $dossier,
            'formRdv' => $formRdv->createView()
        ));
    }
   
    /**
     * 
     * @param integer $id
     * @return view
     */
    public function modifierRendezVousAction($id){
        $rdv = $this->getRendezVous($id);
        
        $formBuilder = $this->createFormBuilder();
        $formBuilder
                ->add('daterdv', 'datetime', array(
                    'label' => 'Selectionner une date',
                    'widget' => 'single_text',
                    'format' => 'dd/MM/yyyy H:mm',
                    'attr' => array(
                        'class' => 'datetimepicker',
                        'id' => 'rdvpicker'
                    )
                ))
                ->add('id_contact', 'hidden', array(
                    'required' => true
                ))
                ->add('id_adresse', 'hidden', array(
                    'required' => true
                ))
//                ->add('lieu', new \Oreha\ErpBundle\Form\AdresseType, array(
//                    'required' => false,
//                    'attr' => array(
//                        'class'=> 'addr'
//                        )
//                    ))
            ;


        $formRdv = $formBuilder->getForm();
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod())=='POST'){
            $formRdv->bind($request);
            
            if($formRdv->isValid()){
                $em = $this->getDoctrine()->getManager();
                $rdv = new Rendezvous();
                $rdv->setDossier($dossier);   
                
                $data = $formRdv->getData();
                
                $rdv->setContact( $this->getContact($data['id_contact']) );
                
                $adresse = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Adresse')->find($data['id_adresse']);
                
                if(!is_object($adresse) ){
                    throw $this->createNotFoundException('id adresse invalide: '. $data['id_adresse']);
                }
                
                if($data['id_adresse'] == -1){
                    $adr= new Adresse();
                    $rdv->setLieu( $data['lieu']);
                }else{
                    $rdv->setLieu( clone $adresse );
                }
                
                $rdv->setDate( $data['daterdv'] );
                $rdv->setUser( $dossier->getResponsable() );
                
                $em->persist($rdv);
                $em->persist($dossier);
                $em->flush();
            }
            
           return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
        }
        
        
        return $this->render('OrehaErpBundle:RendezVous:edit.html.twig', array(
           'rdv' =>$rdv,
            'formRdv' => $formRdv->createView()
        ));
    }
    
    
    /**
     * VOIR RDV
     * @param integer $id
     * @return view
     */
    public function voirRendezVousAction($id){
        $rdv = $this->getRendezvous($id);
        
        return $this->render('OrehaErpBundle:RendezVous:voir.html.twig', array(
            'rdv' => $rdv
        ));
    }
    
    /**
     * SUPPRIMER RDV 
     * @param integer $id
     * @return view
     */
    public function supprimerRendezVousAction($id){
        $rdv = $this->getRendezvous($id);
        
        $dossier = $rdv->getDossier();
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($rdv);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
    }
    
    
    // *************************** FONCTIONS UTILES TOOLS ***************************
    
    /**
     * Raccourci pour la recherche et retourne un dossier à partir de son id
     * @param integer $id
     * @return Oreha\ErpBundle\Entity\Dossier
     * @throws notfoundexception
     */
    private function getDossier($id){
        $dossiersRepo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Dossier');
        $dossier = $dossiersRepo->find($id);

        if(!is_object($dossier) && !($dossier instanceof Dossier)){
            throw $this->createNotFoundException('id dossier invalide');
        }
        
        return $dossier;
    }
    
    /**
     * Raccouri pour recuperer un bien
     * @param integer $id
     * @return \Oreha\ErpBundle\Entity\Bien
     * @throws notfoundexception
     */
    private function getBien($id){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Bien');
        $bien = $repo->find($id);
        
        if(!is_object($bien) && !($bien instanceof Bien)){
            throw $this->createNotFoundException('id bien invalide');
        }
        
        return $bien;
    }
    
    /**
     * @var integer $id
     * @throw createnotfoundexception
     * @return Oreha\ErpBundle\Entity\Rendezvous
     */
    private function getRendezvous($id){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Rendezvous');
        $rendezvous = $repo->find($id);
        
        if(!is_object($rendezvous) && !($rendezvous instanceof Rendezvous)){
            throw $this->createNotFoundException('id rdv invalide');
        }
        
        return $rendezvous;
    }
    
    /**
     * @param integer $id
     * @return \Oreha\ErpBundle\Entity\Echeance
     * @throws notfoundexception
     */
    private function getEcheance($id){
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Echeance');
        $echeance = $repo->find($id);
        
        if(!is_object($echeance) || !($echeance instanceof Echeance)){
            throw $this->createNotFoundException('id echeance invalide');
        }
        
        return $echeance;
    }
    
    /**
     * 
     * @param integer $id
     * @return \Oreha\ErpBundle\Entity\Contact
     * @throws notfoundexception
     */
    private function getContact($id){
        $contact = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact')->find($id);
        
        if(!is_object($contact) || !($contact instanceof Contact)){
            throw $this->createNotFoundException('id contact invalide!');
        }
        return $contact; 
   }
   
   /**
    * 
    * @param integer $id
    * @return \Oreha\ErpBundle\Entity\Statut
    * @throws notfoundexception
    */
    private function getStatut($id){
        $statut = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Statut')->find($id);
        
        if(!is_object($statut) || !($statut instanceof Statut)){
            throw $this->createNotFoundException('id statut invalide!');
        }
        return $statut; 
   }

   private function getUserSysteme(){
       $sysName = $this->container->getParameter('sys_user');
       $sys = $this->container->get('fos_user.user_manager')->findUserByUsername($sysName);
       
       if(!is_object($sys) || !($sys instanceof \FOS\UserBundle\Entity\User)){
           throw $this->createNotFoundException('UTILISATEUR SYSTEME INDISPONIBLE');
       }
       
       return $sys;
   }
   
   /**
    * @param integer $id
    * @return \Oreha\ErpBundle\Entity\Pret
    * @throws GUESSWHAT
    */
   private function getPret($id){
       $pret = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Pret')->find($id);
       
       if(!is_object($pret) || !($pret instanceof \Oreha\ErpBundle\Entity\Pret)){
           throw $this->createNotFoundException('id pret invalide');
       }
       
       return $pret;
   }

   /**
    * @param integer $id
    * @return \Oreha\ErpBundle\Entity\Devis
    * @throws notfoundexception
    */
   private function getDevis($id){
       $devis = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Devis')->find($id);
       
       if(!is_object($devis) || !($devis instanceof Devis)){
           throw $this->createNotFoundException('id devis invalide');
       }
       
       return $devis;
   }
   
   /**
    * 
    * @param integer $id
    * @return \Oreha\ErpBundle\Entity\CEE
    * @throws notfoundexception
    */
   public function getCEE($id){
       $cee = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:CEE')->find($id);
       
       if(!is_object($cee) || !($cee instanceof CEE)){
           throw $this->createNotFoundException('id cee invalide');
       }
       
       return $cee;
   }
   
   /**
    * 
    * @param integer $id
    * @return \Oreha\ErpBundle\Entity\Prestation
    * @throws notfoundexception
    */
   public function getPrestation($id){
       $presta=$this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Prestation')->find($id);
       
       if(!is_object($presta) || !($presta instanceof Prestation)){
           throw $this->createNotFoundException('id prestation invalide');
       }
       
       return $presta;
   }
   
   /**
    * @param integer $id
    * @return \Oreha\ErpBundle\Entity\DeclarationAdministrative
    * @throws view
    */
   public function getDeclaration($id){
       $declaration=$this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:DeclarationAdministrative')->find($id);
       
       if(!is_object($declaration) || !($declaration instanceof DeclarationAdministrative)){
           throw $this->createNotFoundException('id declaration invalide');
       }
       
       return $declaration;
   }
   
   /**
    * 
    * @param integer $id
    * @return \Oreha\ErpBundle\Controller\Facture
    * @throws notfoundexception
    */
   public function getFacture($id){
       $facture = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Facture')->find($id);
       
       if(!is_object($facture) || !($facture instanceof Facture)){
           throw $this->createNotFoundException('id facture invalide');
       }
       
       return $facture;
   }
   
    /**
    * 
    * @param integer $id
    * @return \Oreha\ErpBundle\Controller\Payement
    * @throws notfoundexception
    */
   public function getPayement($id){
       $payement = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Payement')->find($id);
       
       if(!is_object($payement) || !($payement instanceof Payement)){
           throw $this->createNotFoundException('id payement invalide');
       }
       
       return $payement;
   }
   
    // ----------------------------- ECHEANCES DU DOSSIER -----------------------
    
    /**
     * 
     * @param integer $id
     * @throws notFoundException
     * @return view
     */
     public function ajouterEcheanceAction($id){
         $dossier = $this->getDossier($id);
         
         $echeance = new Echeance();
         $echeance->setDossier($dossier);
         
         $formEcheance = $this->createForm(new EcheanceType(), $echeance);
         
         $request = $this->getRequest();
         if(strtoupper($request->getMethod()) == 'POST' ){
             $formEcheance->bind($request);
             
             if($formEcheance->isValid()){
                 $em = $this->getDoctrine()->getManager();
                 
                 $em->persist($echeance);
                 $em->flush();
             }else{
                 die('lol');
             }
             
             return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=>$dossier->getId() ) ) );
         }
         
         return $this->render('OrehaErpBundle:Echeance:new.html.twig', array(
             'formEcheance' => $formEcheance->createView(),
             'dossier' => $dossier
         ));
     }

     
     /**
      * @param integer $id
      * @return view
      */
     public function modifierEcheanceAction($id){
         $echeance = $this->getEcheance($id);
         $formEcheance = $this->createForm(new EcheanceType(), $echeance);
         
         $request = $this->getRequest();
         if(strtoupper($request->getMethod()) == 'POST'){
             $formEcheance->bind($request);
             
             if($formEcheance->isValid()){
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($echeance);
                 $em->flush();
             }
             
             return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=> $echeance->getDossier()->getId() ) ) );
             
         }
         
        return $this->render('OrehaErpBundle:Echeance:new.html.twig', array(
             'formEcheance' => $formEcheance->createView(),
             'dossier' => $echeance->getDossier()
         ));
     }
     
     /**
      * @param integer $id
      * @return view
      */
     public function voirEcheanceAction($id){
         $echeance = $this->getEcheance($id);
         
         return $this->render('OrehaErpBundle:Echeance:voir.html.twig', array(
            'echeance' => $echeance
         ));
     }
     
     /**
      * @param integer $id
      * @return view
      */
     public function supprimerEcheanceAction($id){
         $echeance = $this->getEcheance($id);
         $dossier = $echeance->getDossier();
         
         $em = $this->getDoctrine()->getManager();
         
         $em->remove($echeance);
         $dossier->removeEcheance($echeance);
         $em->persist($dossier);
         
         $em->flush();
         
         return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=> $dossier->getId() ) ) );
     }
     
     
    // ----------------------------- TRANSFERT DE DOSSIER -----------------------
    
    /**
     * @param integer $id
     * @return view
     */
    public function transfertDossierAction($id){
        $dossier = $this->getDossier($id);
        
        $statut = new Statut();
        $statut->setDossier($dossier);
        $formTransfert = $this->createForm( new StatutType, $statut);
        
        $echeance = new Echeance();
        $echeance->setDossier($dossier);
        $formEcheance = $this->createForm(new EcheanceType, $echeance);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) =='POST'){
            $formTransfert->bind($request);
            
            if($formTransfert->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $formEcheance->bind($request);
                if($formEcheance->isValid()){
                    $dossier->addEcheance($echeance);
                    $em->persist($echeance);

                }
                
                $dossier->addStatut($statut);
                $statut->setDossier($dossier);
                $em->persist($dossier);
                $em->persist($statut);
                $em->flush();
                
                $em->refresh($dossier);
                $dossier->reloadUsers();
                $em->persist($dossier);
                $em->flush();
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=> $dossier->getId() ) ) );
        }
        
        
        return $this->render('OrehaErpBundle:Dossier:transferer.html.twig', array(
            'formTransfert' => $formTransfert->createView(),
            'formEcheance' => $formEcheance->createView(),
            'dossier' => $dossier
        ));
    }
    
    /**
     * @param integer $id
     * @return redirection
     */
    public function validerTransfertAction($id){
        $statut = $this->getStatut($id);

        $em = $this->getDoctrine()->getManager();
        
        $statut->setTransfered( new \DateTime('now') );
        
        $em->persist($statut);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=> $statut->getDossier()->getId() ) ) ) ;
        
    }
    /**
     * 
     * @param type $id
     * @return redirection
     */
    public function refuserTransfertAction($id){
        $statut = $this->getStatut($id);
        $dossier = $statut->getDossier();
        
        // REFUS == SUPPRESSION
        $em = $this->getDoctrine()->getManager();
        
        $dossier->removeStatut($statut);
        
        $em->persist($dossier);
        $em->remove($statut);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id'=> $dossier->getId() ) ) ) ;
    }
    
    // ----------------------------- PRETS -----------------------
    
    /**
     * Ajouter un pret au dossier
     * @param integer $id
     * @return view
     */
    public function ajouterPretAction($id){
        $dossier = $this->getDossier($id);
        
        $pret = new Pret();
        $pret->setDossier($dossier);
        $formPret = $this->createForm(new \Oreha\ErpBundle\Form\PretType(), $pret);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formPret->bind($request);
            
            if($formPret->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $pret->setDossier($dossier);
                $dossier->addPret($pret);
                
                $em->persist($dossier);
                $em->persist($pret);
                $em->flush();
                
                $em->refresh($pret);
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_pret_voir', array('id' => $pret->getId() ) ) );
        }
        
            return $this->render('OrehaErpBundle:Pret:new.html.twig', array(
                'formPret' => $formPret->createView(),
                'dossier' => $dossier
            ));
    }
    
    /**
     * Modifier un pret
     * @param integer $id
     * @return view
     */
    public function modifierPretAction($id){
        $pret = $this->getPret($id);
        $dossier = $pret->getDossier();
        
        $formPret= $this->createForm(new PretType(), $pret);
        
        $request = $this->getRequest();
        
        if(strtoupper($request->getMethod()) == 'POST'){
            $formPret->bind($request);
            
            if($formPret->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($pret);
                $em->flush();
                
            }
            
            return $this->redirect( $this->generateUrl('oreha_erp_dossier_pret_voir', array('id' => $pret->getId() ) ) );
        }
        
        return $this->render('OrehaErpBundle:Pret:new.html.twig', array(
            'formPret' =>$formPret->createView(),
            'dossier' => $dossier
        ));
    }
    
    /**
     * Voir un pret
     * @param integer $id
     */
    public function voirPretAction($id){
        $pret = $this->getPret($id);
        
        return $this->render('OrehaErpBundle:Pret:voir.html.twig', array(
            'pret' => $pret,
            'dossier' => $pret->getDossier()
        ));
    }
    

    /**
     * @param integer $id
     * @return redirection
     */
    public function supprimerPretAction($id){
        $pret = $this->getPret($id);
        $dossier = $pret->getDossier();
        
        $em = $this->getDoctrine()->getManager();
        
        $dossier->removePret($pret);
        $em->remove($pret);
        $em->persist($dossier);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())) );
    }
    
    // ----------------------------- DEVIS -----------------------
    
    /**
     * @param integer $id id dossier
     * @return view
     */
    public function voirDevisAction($id){
        $devis = $this->getDevis($id);
        
        return $this->render('OrehaErpBundle:Devis:voir.html.twig', array(
            'devis' => $devis
        ));
    }
    
    /**
     * @param integer $id
     * @return view
     */
    public function ajouterDevisAction($id){
        $devis = new Devis();
        $dossier =$this->getDossier($id);
        
        $devis->setDossier($dossier);
        $formDevis = $this->createForm(new DevisType(), $devis);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formDevis->bind($request);
            
            if($formDevis->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $dossier->addDeviss($devis);
                $devis->setDossier($dossier);
                
                $em->persist($devis);
                $em->persist($dossier);
                
                $em->flush();
                $em->refresh($devis);
                
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_devis_voir', array(
                'id' => $devis->getId()
            )));
        }
        
        return $this->render('OrehaErpBundle:Devis:new.html.twig', array(
            'formDevis' => $formDevis->createView(),
            'dossier' => $dossier
        ));
    }
    
    /**
     * @param integer $id
     * @return view
     */
    public function modifierDevisAction($id){
        $devis = $this->getDevis($id);
        $dossier = $devis->getDossier();
        
        $formDevis = $this->createForm(new DevisType(), $devis);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formDevis->bind($request);
            
            if($formDevis->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $devis->setDossier($dossier);
                $em->persist($devis);
                
                $em->flush();                
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_devis_voir', array(
                'id' => $devis->getId()
            )));
        }
        
        return $this->render('OrehaErpBundle:Devis:modifier.html.twig', array(
            'formDevis' => $formDevis->createView(),
            'devis' => $devis
        ));
    }
    
    /**
     * @param intefer $id
     * @return redirection
     */
    public function supprimerDevisAction($id){
        $devis = $this->getDevis($id);
        $dossier = $devis->getDossier();
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($devis);
        $em->flush();
        
        return $this->redirect( $this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())) );
    }
    
    // ----------------------------- DEVIS - CEE -----------------------

    
    public function ajouterCEEAction($id){
        $cee = new CEE();
        
        $devis = $this->getDevis($id);
        
        $cee->setDevis($devis);
        
        $formCEE= $this->createForm(new CEEType(), $cee);

        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            
            $formCEE->bind($request);
            if($formCEE->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $devis->addCEE($cee);
                $em->persist($cee);
                $em->persist($devis);
                
                $em->flush();
                $em->refresh($cee);
                
                return $this->redirect($this->generateUrl('oreha_erp_dossier_devis_cee_voir', array(
                    'id' => $cee->getId()
                )));
            }
        }

        return $this->render('OrehaErpBundle:CEE:new.html.twig', array(
            'devis' => $devis,
            'formCEE' =>$formCEE->createView()
        ));
    }
    
    
/**
 * 
 * @param integer $id
 * @return view
 */    
    public function modifierCEEAction($id){
        $cee = $this->getCEE($id);
        $devis = $cee->getDevis($id);
        
        $formCEE= $this->createForm(new CEEType(), $cee);

        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            
            $formCEE->bind($request);
            if($formCEE->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($cee);
                $em->flush();
                
                return $this->redirect($this->generateUrl('oreha_erp_dossier_devis_cee_voir', array(
                    'id' => $cee->getId()
                )));
            }
        }

        return $this->render('OrehaErpBundle:CEE:modifier.html.twig', array(
            'devis' => $devis,
            'cee' => $cee,
            'formCEE' =>$formCEE->createView()
        ));    }

    /**
     * @param integer $id
     * @return view
     */
    public function voirCEEAction($id){
        $cee = $this->getCEE($id); 
        
        return $this->render('OrehaErpBundle:CEE:voir.html.twig', array(
           'cee' => $cee
        ));
   }
    
   /**
    * @param integer $id
    * @return redirection
    */
    public function supprimerCEEAction($id){
        $cee = $this->getCEE($id);
        $devis = $cee->getDevis();
        
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($cee);
        $em->flush();
        
        return $this->redirect($this->generateUrl('oreha_erp_dossier_devis_voir', array(
            'id' =>$devis->getId()
        )));
    }
    
    // ----------------------------- Dossier PRESTATIONS -----------------------

    /**
     * @param integer $id
     * @return view
     */
    public function voirPrestationAction($id){
        $presta = $this->getPrestation($id);
        
        return $this->render('OrehaErpBundle:Prestation:voir.html.twig', array(
           'prestation' => $presta
        ));
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function ajouterPrestationAction($id){
        $presta = new Prestation();
        $dossier = $this->getDossier($id);
        $presta->setDossier($dossier);
        $formPresta = $this->createForm(new PrestationType(), $presta);
        
        $request =$this->getRequest();
        
        if(strtoupper($request->getMethod()) == 'POST'){
            $formPresta->bind($request);
            
            if($formPresta->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $presta->setDossier($dossier);
                $dossier->addPrestation($presta);
                
                $em->persist($presta);
                $em->persist($dossier);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_prestation_voir', array('id' => $presta->getId() )));
        }
        
        return $this->render('OrehaErpBundle:Prestation:new.html.twig', array(
            'formPrestation' => $formPresta->createView(),
            'prestation' => $presta
        ));
        
    }
    
    
    public function modifierPrestationAction($id){
        $presta = $this->getPrestation($id);
        $formPresta = $this->createForm(new PrestationType(), $presta);
        
        $request =$this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formPresta->bind($request);
            
            if($formPresta->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($presta);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_prestation_voir', array('id' => $presta->getId() )));
        }
        
        return $this->render('OrehaErpBundle:Prestation:modifier.html.twig', array(
            'formPrestation' => $formPresta->createView(),
            'prestation' => $presta
        ));
    }
    
    /**
     * @param integer $id
     * @return redirection
     */
    public function supprimerPrestationAction($id){
        $em = $this->getDoctrine()->getManager();
        $presta = $this->getPrestation($id);

        $dossier = $presta->getDossier();
        $dossier->removePrestation($prestation);
        $em->remove($presta);
        $em->persist($dossier);
        
        $em->flush();
        
        return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())));
    }
    
  // ----------------------------- Dossier DECLARATIONS -----------------------

    /**
     * @param integer $id
     * @return view
     */
    public function voirDeclarationAction($id){
        $declaration = $this->getDeclaration($id);
        
        return $this->render('OrehaErpBundle:Declaration:voir.html.twig', array(
           'declaration' => $declaration
        ));
    }
    
    /**
     * @param integer $id
     * @return view
     */
    public function ajouterDeclarationAction($id){
        $declaration = new DeclarationAdministrative();
        $dossier = $this->getDossier($id);
        $declaration->setDossier($dossier);
        
        $formPresta = $this->createForm(new DeclarationAdministrativeType(), $declaration);
        
        $request =$this->getRequest();
        
        if(strtoupper($request->getMethod()) == 'POST'){
            $formPresta->bind($request);
            
            if($formPresta->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $declaration->setDossier($dossier);
                $dossier->addDeclaration($declaration);
                
                $em->persist($declaration);
                $em->persist($dossier);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_declaration_voir', array('id' => $declaration->getId() )));
        }
        
        return $this->render('OrehaErpBundle:Declaration:new.html.twig', array(
            'formDeclaration' => $formPresta->createView(),
            'declaration' => $declaration
        ));
        
    }
    
    /**
     * 
     * @param integer $id
     * @return view
     */
    public function modifierDeclarationAction($id){
        $declaration = $this->getDeclaration($id);
        $formPresta = $this->createForm(new DeclarationAdministrativeType(), $declaration);
        
        $request =$this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formPresta->bind($request);
            
            if($formPresta->isValid()){
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($declaration);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_declaration_voir', array('id' => $declaration->getId() )));
        }
        
        return $this->render('OrehaErpBundle:Declaration:new.html.twig', array(
            'formDeclaration' => $formPresta->createView(),
            'declaration' => $declaration
        ));
    }
    
    /**
     * @param integer $id
     * @return redirection
     */
    public function supprimerDeclarationAction($id){
        $em = $this->getDoctrine()->getManager();
        $declaration = $this->getDeclaration($id);

        $dossier = $declaration->getDossier();
        $dossier->removeDeclaration($declaration);
        $em->remove($declaration);
        $em->persist($dossier);
        
        $em->flush();
        
        return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())));
    }
    
    // ----------------------------- Dossier FACTURES -----------------------
    
    /**
     * 
     * @param integer $id
     * @return view
     */
    public function voirFactureAction($id){
        $facture = $this->getFacture($id);
        
        return $this->render('OrehaErpBundle:Facture:voir.html.twig', array(
            'facture' => $facture
        ));
    }
    
    /**
     * @param integer $id
     * @return view
     */
    public function ajouterFactureAction($id){
        $dossier = $this->getDossier($id);
        $facture = new Facture;
        $facture->setDossier($dossier);
        $formFacture = $this->createForm(new FactureType, $facture);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formFacture->bind($request);
            
            if($formFacture->isValid()){
                $dossier->addFacture($facture);
                $em = $this->getDoctrine()->getManager();
                $em->persist($facture);
                $em->persist($dossier);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())));
        }
        
        return $this->render('OrehaErpBundle:Facture:new.html.twig', array(
            'formFacture' => $formFacture->createView(),
            'dossier' => $dossier
        ));
    }
    
    public function modifierFactureAction($id){
        $facture = $this->getFacture($id);
        $dossier = $facture->getDossier();
        $formFacture = $this->createForm(new FactureType, $facture);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formFacture->bind($request);
            
            if($formFacture->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($facture);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())));
        }
        
        return $this->render('OrehaErpBundle:Facture:new.html.twig', array(
            'formFacture' => $formFacture->createView(),
            'dossier' => $dossier
        ));
    }
    
    // On ne supprime pas une facture!
    public function supprimerFactureAction($id){
        return null;
    }
    
   // ----------------------------- Dossier PAYEMENTS -----------------------
    
    /**
     * 
     * @param integer $id
     * @return view
     */
    public function voirPayementAction($id){
        $payement = $this->getPayement($id);
        
        return $this->render('OrehaErpBundle:Payement:voir.html.twig', array(
            'payement' => $payement
        ));
    }
    
    /**
     * @param integer $id
     * @return view
     */
    public function ajouterPayementAction($id){
        $dossier = $this->getDossier($id);
        $payement = new Payement;
        $payement->setDossier($dossier);
        $formPayement = $this->createForm(new PayementType, $payement);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formPayement->bind($request);
            
            if($formPayement->isValid()){
                $dossier->addPayement($payement);
                $em = $this->getDoctrine()->getManager();
                $em->persist($payement);
                $em->persist($dossier);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())));
        }
        
        return $this->render('OrehaErpBundle:Payement:new.html.twig', array(
            'formPayement' => $formPayement->createView(),
            'dossier' => $dossier
        ));
    }
    
    public function modifierPayementAction($id){
        $payement = $this->getPayement($id);
        $dossier = $payement->getDossier();
        $formPayement = $this->createForm(new PayementType, $payement);
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formPayement->bind($request);
            
            if($formPayement->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($payement);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId())));
        }
        
        return $this->render('OrehaErpBundle:Payement:new.html.twig', array(
            'formPayement' => $formPayement->createView(),
            'dossier' => $dossier
        ));
    }
    
    public function supprimerPayementAction($id){
        $payement = $this->getPayement($id);
        $dossier = $payement->getDossier();
        
        $em = $this->getDoctrine()->getManager();
        
        $dossier->removePayement($payement);
        $em->remove($payement);
        $em->persist($dossier);
        $em->flush();
        
        return $this->redirect($this->generateUrl('oreha_erp_dossier_voir', array('id' => $dossier->getId()))); 
    }
    
    /**
     * DEBUG 
     */
    public function killAction(){
        $rep = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Dossier');
        $em =$this->getDoctrine()->getManager();
        
        $data = $rep->findTest();
        
        return $this->render('OrehaErpBundle::debug.html.twig', array('data' => $data) );
    }
}

