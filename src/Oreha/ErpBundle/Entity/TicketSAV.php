<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * TicketSAV
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\TicketSAVRepository")
 */
class TicketSAV extends ElementModifiable
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
     * @ORM\Column(name="chrono", type="string", length=20, nullable=true)
     */
    private $chrono;
    
    /**
     * @var string 
     * @ORM\Column(name="intitule", type="string", length=255, nullable=false)
     */
    private $intitule;
    
    /**
     * @var Oreha\ErpBundle\Entity\Client
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Client", inversedBy="tickets" )
     * @ORM\JoinColumn(name="client_id", nullable=false)
     */
    private $client;
    
   /**
     * @var string
     *
     * @ORM\Column(name="retourInstruction", type="string", length=20, nullable=false)
     */
    private $statut;
    
    /**
     * @var Oreha\ErpBundle\Entity\Commentaire
     * @ORM\ManyToMany(targetEntity="Oreha\ErpBundle\Entity\Commentaire", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     * @ORM\JoinTable(name="ticket_commentaires", 
     *              joinColumns={ @ORM\JoinColumn(name="ticket_id", referencedColumnName="id") }, 
     *              inverseJoinColumns={ @ORM\JoinColumn(name="commentaire_id", referencedColumnName="id") }
     *      )
     */
    protected $commentaires;

    // ---- METHODES PERSO

    /**
     * @return integer
     */
    public function getChrono(){
        return $this->getDateCreation()->format('Ym') . $this->getId();
    }
    
    
    /**
     * 
     * @return \DateTime
     */
    public function getDateOuverture(){
        return $this->getDateCreation();
    }
    
    // ---- METHODES AUTO
    
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
     * Constructor
     */
    public function __construct()
    {
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set client
     *
     * @param \Oreha\ErpBundle\Entity\Client $client
     * @return TicketSAV
     */
    public function setClient(\Oreha\ErpBundle\Entity\Client $client)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \Oreha\ErpBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add commentaires
     *
     * @param \Oreha\ErpBundle\Entity\Commentaire $commentaires
     * @return TicketSAV
     */
    public function addCommentaire(\Oreha\ErpBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires[] = $commentaires;
    
        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \Oreha\ErpBundle\Entity\Commentaire $commentaires
     */
    public function removeCommentaire(\Oreha\ErpBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires->removeElement($commentaires);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return TicketSAV
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    
        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     * @return TicketSAV
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set chrono
     *
     * @param string $chrono
     * @return TicketSAV
     */
    public function setChrono($chrono)
    {
        $this->chrono = $chrono;
    
        return $this;
    }
}
