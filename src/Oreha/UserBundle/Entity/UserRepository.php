<?php

namespace Oreha\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * StatutRepository
 *
 */
class UserRepository extends EntityRepository{
    
    /**
     * Trouve les utilisateurs d'un groupe
     * @param string $role
     * @return OrehaUserBundle\Entity\User
     */
    public function findByRole($role) {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u')
                ->from($this->_entityName, 'u')
                ->where('u.roles LIKE :roles')
                ->setParameter('roles', '%' . $role . '%');
        return $qb->getQuery()->getResult();
    }
    
    
}
