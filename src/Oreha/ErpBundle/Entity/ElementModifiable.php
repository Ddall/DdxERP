<?php
/**
 * Description of ElementModifiable
 *
 * @author allan.irdel
 */

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Oreha\ErpBundle\Entity\ElementReadOnly;

/**
 * @ORM\MappedSuperClass
 */
class ElementModifiable {
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDerniereModif", type="datetime")
     */
    private $dateDerniereModif;

    /**
     * @ORM\ManyToOne(targetEntity="Oreha\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dernierModificateur;
   

    // METHODS
    
    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return ElementModifiable
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
     * Set dateDerniereModif
     *
     * @param \DateTime $dateDerniereModif
     * @return ElementModifiable
     */
    public function setDateDerniereModif($dateDerniereModif)
    {
        $this->dateDerniereModif = $dateDerniereModif;

        return $this;
    }

    /**
     * Get dateDerniereModif
     *
     * @return \DateTime 
     */
    public function getDateDerniereModif()
    {
        return $this->dateDerniereModif;
    }

    /**
     * Set createur
     *
     * @param \Oreha\UserBundle\Entity\User $createur
     * @return ElementModifiable
     */
    public function setCreateur(\Oreha\UserBundle\Entity\User $createur)
    {
        $this->createur = $createur;

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

    /**
     * Set dernierModificateur
     *
     * @param \Oreha\UserBundle\Entity\User $dernierModificateur
     * @return ElementModifiable
     */
    public function setDernierModificateur(\Oreha\UserBundle\Entity\User $dernierModificateur)
    {
        $this->dernierModificateur = $dernierModificateur;

        return $this;
    }

    /**
     * Get dernierModificateur
     *
     * @return \Oreha\UserBundle\Entity\User 
     */
    public function getDernierModificateur()
    {
        return $this->dernierModificateur;
    }
}
