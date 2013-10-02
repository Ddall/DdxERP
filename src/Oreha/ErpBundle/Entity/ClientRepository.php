<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\EntityRepository;


class ClientRepository extends EntityRepository
{
    
    // ----- STATITSTIQUES
    /**
     * 
     * @return type
     */
    public function findNombreClientsGagnesParMois(){
        $q = $this->createQueryBuilder('c');
        $q
                ->select('COUNT(c), SUBSTRING(c.dateCreation, 6,2) as month, SUBSTRING(c.dateCreation, 1, 4) as year')
                ->orderBy('year, month')
                ->groupBy('month, year')
        
        ;
        return $q->getQuery()->execute();
    }
    
    /**
     * 
     */
    public function findMarcheMoyen(){
        $q = $this->createQueryBuilder('c');
        $q
                ->select('COUNT(c), SUBSTRING(c.dateCreation, 6,2) as month, SUBSTRING(c.dateCreation, 1, 4) as year')
                ->orderBy('year, month')
                ->groupBy('month, year')
        
        ;
        return $q->getQuery()->execute();
    }
    
    public function findMarcheMoyenParMois(){
        $q = $this->createQueryBuilder('c');
        $q
                ->select('COUNT(c), SUBSTRING(c.dateCreation, 6,2) as month, SUBSTRING(c.dateCreation, 1, 4) as year')
                ->orderBy('year, month')
                ->groupBy('month, year')
        
        ;
        return $q->getQuery()->execute();
    }
}
