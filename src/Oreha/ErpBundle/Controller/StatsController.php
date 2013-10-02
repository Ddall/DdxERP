<?php
/**
 * Description of StatsController
 *
 * @author allan.irdel
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Doctrine\Common\Collections\ArrayCollection;

class StatsController extends Controller {
    
    /**
     * 
     */
    public function publicIndexAction(){
        
    }
   
    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function managerIndexAction(){
        
        return $this->render('OrehaErpBundle:Stats:manager_dashboard.html.twig', array(
            'nombreProspectsParMois' => $this->getDossierRepository()->findNombreProspectsParMois(),
            'nombreAffairesChiffreesPerdues' => $this->getDossierRepository()->findAffairesChiffreesPerdues(),
            'table' => $this->makeStatsCommerciales()
//            'table' => $this->getDossierRepository()->findNbDossiersParSource(1)
            
        ));
    }
    
    
    public function statsCommercialesAction(){
        $table = $this->
                
        return ;
    }

    private function makeStatsCommerciales(){
        $table = new ArrayCollection();
        
        $sources = $this->getSourceRepository()->findAll();
        
        foreach($sources as $source){
            $line = array(
                'idSource'          => $source->getId(),
                'nomSource'         => $source->getNom(),
                'nombreDossiers'    => $this->getDossierRepository()->findNbDossiersParSource($source->getId() ),
                'nombreSansSuite'   => $this->getDossierRepository()->findNbDossiersSansSuiteParSource($source->getId() ),
                'nombrePerdus'      => $this->getDossierRepository()->findNbDossiersPerdusParSource($source->getId() ),
                'nombreDevisPerdus' => $this->getDevisRepository()->findNbDossiersAvecDevisPerdusParSource($source->getId() ),
//                'soldeDossiers'     => $this->getDevisRepository()->findSoldDossiersParSource($source->getId())
            );
            
            
            
            $table->add($line);
        }
        
        return $table;
    }
    
    // -- HELPERS
    
    private function getDossierRepository(){
        return $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Dossier');
    }
    
    private function getClientRepository(){
        return $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Client');
    }
            
    private function getDevisRepository(){
        return $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Devis');
    }
            
    private function getFactureRepository(){
        return $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Facture');
    }
    
    private function getSourceRepository(){
        return $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Source');
    }
   
    
    private function getEntityManager(){
        return $this->getDoctrine()->getManager();
    }
    
    
}
