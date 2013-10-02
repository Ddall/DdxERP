<?php

namespace Oreha\ErpBundle\EventListener;

use ADesigns\CalendarBundle\Event\CalendarEvent;
use ADesigns\CalendarBundle\Entity\EventEntity;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;



/**
 * Description of CalendarEventListener
 *
 * @author Allan
 */
class CalendarEventListener {
    private $entityManager;
    private $container;
 
    /**
     * 
     * @param \Doctrine\ORM\EntityManager $entityManager
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(EntityManager $entityManager, ContainerInterface $container )
    {
        $this->entityManager = $entityManager;
        $this->container = $container;
    }

    /**
     * LA LOGIQUE DE CREATION DU CALENDRIER SE TROUVE ICI
     * @param \ADesigns\CalendarBundle\Event\CalendarEvent $calendarEvent
     */
    public function loadEvents(CalendarEvent $calendarEvent){
        
        $user = $this->container->get('security.context')->getToken()->getUser();
        $router = $this->container->get('router');
        
//        $startDate = $calendarEvent->getStartDatetime();
//        $endDate = $calendarEvent->getEndDatetime();

        // ECHEANCES
        $repoEcheances = $this->entityManager->getRepository('OrehaErpBundle:Echeance');
        $echeances = $repoEcheances->findByUser( $user->getId() );

        foreach($echeances AS $echeance ){

            $libelleEvent = '['.$echeance->getDossier()->getIntitule().'] '. $echeance->getLibelle();

            $event = new EventEntity( $libelleEvent, $echeance->getDateCreation(), $echeance->getDate(), false );
            $event->setBgColor('#003300'); //set the background color of the event's label
            $event->setFgColor('#FFFFFF'); //set the foreground color of the event's label
            $event->setUrl( $router->generate( 'oreha_erp_dossier_voir', array('id'=> $echeance->getDossier()->getId() ) ));

            $calendarEvent->addEvent($event);
        }

        
//        // RENDEZVOUS
//        $repoRdv = $this->entityManager->getRepository('OrehaErpBundle:Rendezvous');
//        $rdvs = $repoRdv->findByUser( $user->getId() );
//        
//        foreach($rdvs AS $rdv){
//            $event = new EventEntity('Rendez-vous ' . $rdv->getDossier()->getIntitule() ,  $rdv->getDate(), null, true );
//            $event->setBgColor('#FF3300'); //set the background color of the event's label
//            $event->setFgColor('#FFFFFF'); //set the foreground color of the event's label
//            $event->setUrl( $router->generate( 'oreha_erp_dossier_voir', array('id'=> $rdv->getDossier()->getId() ) ));
//
//            $calendarEvent->addEvent($event);
//        }
            
        
    }
    
}
