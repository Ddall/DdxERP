<?php
namespace Oreha\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Oreha\UserBundle\Entity\Group;


class LoadGroupData implements OrderedFixtureInterface, ContainerAwareInterface{
    /**
     * @var ContainerInterface 
     */
    private $container;
    
    public function getOrder() {
        return 1;
    }
    
    public function LoadGroupData(ObjectManager $manager){
        $groups = new \Doctrine\Common\Collections\ArrayCollection;
        
        $superadministrateur= new Group('Super Administrateurs');
        $superadministrateur->addRole('ROLE_SUPER_ADMIN');
        $groups->add($superadministrateur);

        
        foreach($groups AS $group){
            $manager->persist($group);
        }
        $manager->flush();
    }
    
    
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }    
}