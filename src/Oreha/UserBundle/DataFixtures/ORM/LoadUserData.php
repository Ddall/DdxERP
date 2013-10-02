<?php
/**
 * Description of Users
 *
 * @author Allan
 */

namespace Oreha\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Oreha\UserBundle\Entity\User;


class LoadUserData implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    
    /**
     * Cree l'admin si il n'existe pas et l'ajoute dans le groupe admin
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $uem = $this->container->get('fos_user.user_manager');
        
        $admin = $uem->findUserByUsername( $this->container->get('admin_username') );
        
        if(!is_object($admin) || !($admin instanceof User)){
            $admin = $uem->createUser();
            $admin->setUsername('admin');
        }
        
        $admin->setEmail( $this->container->getParameter('app_email'));
        $admin->setPassword('OrehaErp2013');
        
        $group = $manager->getRepository('OrehaUserBundle:Group')->findByName( $this->container->getParameter('superadmin_group'));
        
        $admin->addGroup( $group );
        
        $uem->updateUser($admin);
    }
    
    public function getOrder() {
        2;
    }
    
}