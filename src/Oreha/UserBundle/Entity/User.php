<?php

namespace Oreha\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 * @ORM\Table()
 * @ORM\Entity
 */
class User extends BaseUser{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToMany(targetEntity="Oreha\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="user_groupe",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="groupe_id", referencedColumnName="id")}
     *      )
     */
    protected $groups;
    
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $fullName;
    
    public function getFullName(){
        return $this->fullName;
    }
    
    public function setFullName($fullName){
        $this->fullName = $fullName;
        return $this->fullName;
    }
    
    public function hasFullName(){
        return isset($this->fullName);
    }
    
       
    /**
     * @var Oreha\ErpBundle\Entity\Dossier
     * @ORM\ManyToMany(targetEntity="Oreha\ErpBundle\Entity\Dossier", mappedBy="users")
     */
    private $dossiers;

    /**
     * Add dossiers
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossiers
     * @return User
     */
    public function addDossier(\Oreha\ErpBundle\Entity\Dossier $dossiers)
    {
        $this->dossiers[] = $dossiers;

        return $this;
    }

    /**
     * Remove dossiers
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossiers
     */
    public function removeDossier(\Oreha\ErpBundle\Entity\Dossier $dossiers)
    {
        $this->dossiers->removeElement($dossiers);
    }

    /**
     * Get dossiers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDossiers()
    {
        return $this->dossiers;
    }
}