<?php
/*
 *  OrehaERP - allan.irdel
 *  AdminController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

class AdminController extends Controller{
    
    /**
     * @Secure(roles="ROLE_ADMINISTATEUR")
     */
    public function indexAction(){
        return $this->render('OrehaErpBundle:Admin:index.html.twig');
    }
    
    /**
     * @Secure(roles="ROLE_ADMINISTATEUR")
     */
    public function reloadDossiersAction(){
        $dossiers = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Dossier')->findAll();
        
        $em = $this->getDoctrine()->getManager();
        
        
        foreach($dossiers as $dossier){
//            $dossier->clearUsers();
//            $em->flush();
//            $em->refresh($dossier);
            
            $dossier->reloadUsers();
            $em->persist($dossier);
        }
            
        $em->flush();
        
        return $this->render('OrehaErpBundle:Admin:reloadDossiers.html.twig', array(
           'dossiers'  => $dossiers
        ));
    }
    
    
}

