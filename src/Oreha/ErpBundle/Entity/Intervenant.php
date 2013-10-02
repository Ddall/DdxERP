<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Intervenant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\IntervenantRepository")
 */
class Intervenant extends ElementModifiable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=false)
     */
    private $role;

    /**
     * @var Oreha\ErpBundle\Entity\Chantier
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Chantier", inversedBy="intervenants" )
     * @ORM\JoinColumn(name="client_id", nullable=false)
     */
    private $chantier;
    
    /**
     * @var Oreha\UserBundle\Entity\User
     * @ORM\OneToOne(targetEntity="Oreha\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", nullable=false)
     */ 
    private $user;
        
    /// ----------- PERSO
    
    
    /// ----------- AUTO


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Intervenant
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set chantier
     *
     * @param \Oreha\ErpBundle\Entity\Chantier $chantier
     * @return Intervenant
     */
    public function setChantier(\Oreha\ErpBundle\Entity\Chantier $chantier)
    {
        $this->chantier = $chantier;
    
        return $this;
    }

    /**
     * Get chantier
     *
     * @return \Oreha\ErpBundle\Entity\Chantier 
     */
    public function getChantier()
    {
        return $this->chantier;
    }

    /**
     * Set user
     *
     * @param \Oreha\UserBundle\Entity\User $user
     * @return Intervenant
     */
    public function setUser(\Oreha\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Oreha\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
