<?php
/**
 * Description of Element
 *
 * @author allan.irdel
 */

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperClass
 */
class ElementReadOnly {
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;
    
    /**
     * @ORM\ManyToOne(targetEntity="Oreha\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createur;
    

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return ElementReadOnly
     */
    public function setDateCreation($dateCreation)
    {
        if($this->dateCreation == null){
            $this->dateCreation = $dateCreation;
        }
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set createur
     *
     * @param \Oreha\UserBundle\Entity\User $createur
     * @return ElementReadOnly
     */
    public function setCreateur(\Oreha\UserBundle\Entity\User $createur)
    {
        
        if($this->createur == null){
            $this->createur = $createur;
        }
        
        return $this;
    }

    /**
     * Get createur
     *
     * @return \Oreha\UserBundle\Entity\User 
     */
    public function getCreateur()
    {
        return $this->createur;
    }
}
