<?php
/**
 * @author allan.irdel
 */
namespace Oreha\ErpBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Oreha\ErpBundle\Entity\Statut;

class StatutListener {
    
    protected $container;
    
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    
    
    /**
     * Fonction pour autocompletion
     * @return \Doctrine\ORM\EntityManager
     */
    private function getEm($a){
        return $a->getEntityManager();
    }
    
    
    /**
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args){
        $entity = $args->getEntity();
        $em = $args->getEntityManager();
        
        if($entity instanceof Statut){
            
            if($entity->getLibelle() != null){
               
                switch ( $entity->getLibelle() ) {
                    case 'source':
                        $entity->setChr('S');
                        break;
                    
                    case 'rendez-vous':
                        $entity->setChr('R');
                        break;
                    
                    case 'etude':
                        $entity->setChr('E');
                        break;
                    
                    case 'client';
                        $entity->setChr('CL');
                        break;
                    
                    case 'chantier':
                        $entity->setChr('CH');
                        break;
                    
                    case 'gagne':
                        $entity->setChr('G');
                        break;
                    
                    case 'perdu':
                        $entity->setChr('P');
                        break;
                    
                    default:
                        $entity->setChr('X');
                        break;
                }

                $repo = $em->getRepository('OrehaErpBundle:Statut');
                $num = $repo->makeNum($entity->getDossier()->getId(), $entity->getChr() );
                
                if($num == null) $num = 0;
                
                $entity->setNum($num);
            }
        }
        
    }

}