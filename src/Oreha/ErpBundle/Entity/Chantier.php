<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Chantier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\ChantierRepository")
 */
class Chantier extends ElementModifiable
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
     * @var \DateTime
     *
     * @ORM\Column(name="debutTravaux", type="date", nullable=true)
     */
    private $debutTravaux;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debutPreparation", type="date", nullable=true)
     */
    private $debutPreparation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finPrevue", type="date", nullable=true)
     */
    private $finPrevue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finReele", type="date", nullable=true)
     */
    private $finReele;
    
    
    //---- UTILIATEURS
    /**
     * @ORM\OneToMany(targetEntity="Oreha\ErpBundle\Entity\Intervenant", cascade={"persist", "remove"}, mappedBy="client", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $intervenants;

    
    /**
     * @ORM\OneToOne(targetEntity="Oreha\ErpBundle\Entity\Adresse", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $adresse;
    
    
    /**
     * @var string 
     * @ORM\Column(name="labelisation", type="text", nullable=true)
     */
    private $labelisation;
    
    
    /**
     * @var Oreha\ErpBundle\Entity\Commentaire
     * @ORM\ManyToMany(targetEntity="Oreha\ErpBundle\Entity\Commentaire", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinTable(name="chantier_commentaires", 
     *              joinColumns={ @ORM\JoinColumn(name="chantier_id", referencedColumnName="id") }, 
     *              inverseJoinColumns={ @ORM\JoinColumn(name="commentaire_id", referencedColumnName="id") }
     *      )
     */
    private $commentaires;
    
    /**
    * @ORM\OneToOne(targetEntity="Oreha\ErpBundle\Entity\Client", cascade={"persist"}, inversedBy="chantier")
    */  
    private $client;
    
    
    // METHODES PERSO
     
     
    // METHODES AUTO

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->intervenants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set debutTravaux
     *
     * @param \DateTime $debutTravaux
     * @return Chantier
     */
    public function setDebutTravaux($debutTravaux)
    {
        $this->debutTravaux = $debutTravaux;
    
        return $this;
    }

    /**
     * Get debutTravaux
     *
     * @return \DateTime 
     */
    public function getDebutTravaux()
    {
        return $this->debutTravaux;
    }

    /**
     * Set debutPreparation
     *
     * @param \DateTime $debutPreparation
     * @return Chantier
     */
    public function setDebutPreparation($debutPreparation)
    {
        $this->debutPreparation = $debutPreparation;
    
        return $this;
    }

    /**
     * Get debutPreparation
     *
     * @return \DateTime 
     */
    public function getDebutPreparation()
    {
        return $this->debutPreparation;
    }

    /**
     * Set finPrevue
     *
     * @param \DateTime $finPrevue
     * @return Chantier
     */
    public function setFinPrevue($finPrevue)
    {
        $this->finPrevue = $finPrevue;
    
        return $this;
    }

    /**
     * Get finPrevue
     *
     * @return \DateTime 
     */
    public function getFinPrevue()
    {
        return $this->finPrevue;
    }

    /**
     * Set finReele
     *
     * @param \DateTime $finReele
     * @return Chantier
     */
    public function setFinReele($finReele)
    {
        $this->finReele = $finReele;
    
        return $this;
    }

    /**
     * Get finReele
     *
     * @return \DateTime 
     */
    public function getFinReele()
    {
        return $this->finReele;
    }

    /**
     * Set labelisation
     *
     * @param string $labelisation
     * @return Chantier
     */
    public function setLabelisation($labelisation)
    {
        $this->labelisation = $labelisation;
    
        return $this;
    }

    /**
     * Get labelisation
     *
     * @return string 
     */
    public function getLabelisation()
    {
        return $this->labelisation;
    }

    /**
     * Add intervenants
     *
     * @param \Oreha\ErpBundle\Entity\Intervenant $intervenants
     * @return Chantier
     */
    public function addIntervenant(\Oreha\ErpBundle\Entity\Intervenant $intervenants)
    {
        $this->intervenants[] = $intervenants;
    
        return $this;
    }

    /**
     * Remove intervenants
     *
     * @param \Oreha\ErpBundle\Entity\Intervenant $intervenants
     */
    public function removeIntervenant(\Oreha\ErpBundle\Entity\Intervenant $intervenants)
    {
        $this->intervenants->removeElement($intervenants);
    }

    /**
     * Get intervenants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIntervenants()
    {
        return $this->intervenants;
    }

    /**
     * Set adresse
     *
     * @param \Oreha\ErpBundle\Entity\Adresse $adresse
     * @return Chantier
     */
    public function setAdresse(\Oreha\ErpBundle\Entity\Adresse $adresse = null)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return \Oreha\ErpBundle\Entity\Adresse 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Add commentaires
     *
     * @param \Oreha\ErpBundle\Entity\Commentaire $commentaires
     * @return Chantier
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
     * Set client
     *
     * @param \Oreha\ErpBundle\Entity\Client $client
     * @return Chantier
     */
    public function setClient(\Oreha\ErpBundle\Entity\Client $client = null)
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
}
