<?php
/*
 *  OrehaERP - allan.irdel
 *  RootController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class indexController extends Controller{
    
    /**
     * Page d'accueil. Echeances , RDV et taches du user
     * @return view
     */
    public function indexAction(){
        $user = $this->getUser();
        
        $repoEcheances = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Echeance');
        $echeances = $repoEcheances->findEcheancesATrairerUser( $user->getId() );
//        $echeances = $repoEcheances->findByUser( $user->getId() );

        $repoRdvs= $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Rendezvous');
        $rdvs = $repoRdvs->findByUser( $user->getId() );

        
        $repoStatuts = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Dossier');
        $tovalidate = $repoStatuts->findDossiersEnAttenteValidation();
        
        return $this->render('OrehaErpBundle:Erp:index.html.twig', array(
            'echeances' => $echeances,
            'rdvs' => $rdvs,
            'tovalidate' => $tovalidate
        ));

    }
    

    /**
     * Affiche le calendrier du user.
     * Le calendrier est géré par le listener Oreha\ErpBundle\EventListener\CalendarEventListener
     * @return view
     */
    public function calendrierAction(){
        return $this->render('OrehaErpBundle:Erp:calendrier.html.twig');
    }
    
    
}