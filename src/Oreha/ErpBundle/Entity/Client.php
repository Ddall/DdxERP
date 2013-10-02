<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Client
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\ClientRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Client extends ElementModifiable
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
     * @var Oreha\ErpBundle\Entity\Dossier
     * @ORM\OneToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier")
     * @ORM\JoinColumn(name="dossier_id", referencedColumnName="id") 
     */
    private $dossier;
    
    /**
     * @ORM\OneToOne(targetEntity="Oreha\ErpBundle\Entity\Chantier", cascade={"persist", "remove"}, orphanRemoval=true, mappedBy="client")
     */
    private $chantier;
    
    /**
     * @var Oreha\ErpBundle\Entity\TicketSAV 
     * @ORM\OneToMany(targetEntity="Oreha\ErpBundle\Entity\TicketSAV", mappedBy="client", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $tickets;
    
    // METHODES PERSO
    /**
     * Date de validation == date de creation
     * @return \DateTime
     */
    public function getDateValidation(){
        return $this->getDateCreation();
    } 
    
    
    // METHODES AUTO

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
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Client
     */
    public function setDossier(\Oreha\ErpBundle\Entity\Dossier $dossier = null)
    {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * Get dossier
     *
     * @return \Oreha\ErpBundle\Entity\Dossier 
     */
    public function getDossier()
    {
        return $this->dossier;
    }

    /**
     * Set chantier
     *
     * @param \Oreha\ErpBundle\Entity\Chantier $chantier
     * @return Client
     */
    public function setChantier(\Oreha\ErpBundle\Entity\Chantier $chantier = null)
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
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tickets
     *
     * @param \Oreha\ErpBundle\Entity\TicketSAV $tickets
     * @return Client
     */
    public function addTicket(\Oreha\ErpBundle\Entity\TicketSAV $tickets)
    {
        $this->tickets[] = $tickets;
    
        return $this;
    }

    /**
     * Remove tickets
     *
     * @param \Oreha\ErpBundle\Entity\TicketSAV $tickets
     */
    public function removeTicket(\Oreha\ErpBundle\Entity\TicketSAV $tickets)
    {
        $this->tickets->removeElement($tickets);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTickets()
    {
        return $this->tickets;
    }
}
