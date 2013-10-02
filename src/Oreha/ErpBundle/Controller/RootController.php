<?php
/*
 *  OrehaERP - allan.irdel
 *  RootController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Oreha\UserBundle\Entity\Group;

class RootController extends Controller{
    public function indexAction(){
        return $this->render('OrehaErpBundle:Erp:index.html.twig');
    }
    
    public function dossierAction($idDossier){
        return $this->render('OrehaErpBundle:Erp:dossier.html.twig');
    }

    public function clientAction(){
        return $this->render('OrehaErpBundle:Erp:client.html.twig');
    }
    
    public function testAction(){
//        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Dossier');
        $repo = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Client');
        
//        $data = $repo->findNombreProspectsParMois(); // DONE
        $data = $repo->findNombreClientsGagnesParMois();

        return $this->render('OrehaErpBundle::debug.html.twig', array(
            'data' => $data
        ));
        
    }
}