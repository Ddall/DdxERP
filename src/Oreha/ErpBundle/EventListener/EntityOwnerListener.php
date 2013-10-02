<?php
/**
 * @author allan.irdel
 */
namespace Oreha\ErpBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

//use Oreha\ErpBundle\Entity\ElementModifiable;
//use Oreha\ErpBundle\Entity\ElementReadOnly;

class EntityOwnerListener {
    
    protected $container;
    
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    
    /**
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args){
        $entity = $args->getEntity();
        
        if($entity instanceof \Oreha\ErpBundle\Entity\ElementModifiable){
            $user = $this->container->get('security.context')->getToken()->getUser();
            $entity->setCreateur($user);
            $entity->setDernierModificateur($user);
            
            $entity->setDateCreation(new \DateTime('now'));
            $entity->setDateDerniereModif(new \DateTime('now'));
            
        }elseif($entity instanceof \Oreha\ErpBundle\Entity\ElementReadOnly){
            $user = $this->container->get('security.context')->getToken()->getUser();
            $entity->setCreateur($user);
            $entity->setDateCreation(new \DateTime('now'));
        }
    }
    
    /**
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args){
        $entity = $args->getEntity();
        
        if($entity instanceof \Oreha\ErpBundle\Entity\ElementModifiable){
            $user = $this->container->get('security.context')->getToken()->getUser();
            $entity->setDernierModificateur($user);
            $entity->setDateDerniereModif( new \DateTime('now') );
        }
    }
}

