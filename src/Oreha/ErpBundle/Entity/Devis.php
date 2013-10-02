<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Devis
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\DevisRepository")
 */
class Devis extends ElementModifiable
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
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRemise", type="date", nullable=true)
     */
    private $dateRemise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSignature", type="date", nullable=true)
     */
    private $dateSignature;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRefus", type="date", nullable=true)
     */
    private $dateRefus;

    /**
     * @var integer
     * @ORM\Column(name="delaiContractuel", type="integer", nullable=true)
     */
    private $delaiContractuel;
    
    /**
     * @var string 
     * @ORM\Column(name="chronoDevis", type="string", length=20, nullable=true)
     */
    private $chronoDevis;
    
    ///  PERSO
    
    /**
     * @return string
     */
    public function getChrono(){
        return $this->getChronoDevis();
    }
    
    
    /**
     * @return string
     */
    public function getStatut(){
        if($this->getDateRemise() != null){
            if($this->getDateSignature() != null){
                return 'accepte';
            }elseif($this->getDateRefus() != null){
                return 'refuse';
            }else{
                return 'en attente';
            }
            
        }
        return 'pas remis';
        
        
    }
    
    // --------------- METHODES AUTO

    /**
     * @var float
     *
     * @ORM\Column(name="montantHT", type="float", nullable=true)
     */
    private $montantHT;

    /**
     * @var float
     *
     * @ORM\Column(name="montantTVANormale", type="float", nullable=true)
     */
    private $montantTVANormale;
    
    /**
     * @var float
     *
     * @ORM\Column(name="montantTVAReduite", type="float", nullable=true)
     */
    private $montantTVAReduite;

    /**
     * @var string
     *
     * @ORM\Column(name="modeReglement", type="string", length=255, nullable=true)
     */
    private $modeReglement;

    /**
     * @var float
     *
     * @ORM\Column(name="remiseAccordee", type="float", nullable=true)
     */
    private $remiseAccordee;

    
    /**
     * @var Oreha\ErpBundle\Entity\CEE
     * @ORM\OneToMany( targetEntity="Oreha\ErpBundle\Entity\CEE", mappedBy="devis", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $cees;
    
    
    /**
     * @var Oreha\ErpBundle\Entity\Dossier 
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="deviss" )
     * @ORM\JoinColumn(name="dossier_id", nullable=false)
     */
    private $dossier;
    
    /**
     * @ORM\ManyToOne(targetEntity="Oreha\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $realisePar;
    
    
    // METHODES PERSO 
    public function getMontantTVA(){
        if($this->tvaCalculable()){
            return $this->montantTVANormale + $this->montantTVAReduite;
        }
        return null;
    }
    
    /**
     * @return float
     */
    public function getMontantTTC(){
        return $this->montantHT + $this->montantTVANormale + $this->montantTVAReduite;
    }
     
    // METHODES AUTO
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cees = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     * @return Devis
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dateRemise
     *
     * @param \DateTime $dateRemise
     * @return Devis
     */
    public function setDateRemise($dateRemise)
    {
        $this->dateRemise = $dateRemise;
    
        return $this;
    }

    /**
     * Get dateRemise
     *
     * @return \DateTime 
     */
    public function getDateRemise()
    {
        return $this->dateRemise;
    }

    /**
     * Set dateSignature
     *
     * @param \DateTime $dateSignature
     * @return Devis
     */
    public function setDateSignature($dateSignature)
    {
        $this->dateSignature = $dateSignature;
    
        return $this;
    }

    /**
     * Get dateSignature
     *
     * @return \DateTime 
     */
    public function getDateSignature()
    {
        return $this->dateSignature;
    }

    /**
     * Set dateRefus
     *
     * @param \DateTime $dateRefus
     * @return Devis
     */
    public function setDateRefus($dateRefus)
    {
        $this->dateRefus = $dateRefus;
    
        return $this;
    }

    /**
     * Get dateRefus
     *
     * @return \DateTime 
     */
    public function getDateRefus()
    {
        return $this->dateRefus;
    }

    /**
     * Set delaiContractuel
     *
     * @param integer $delaiContractuel
     * @return Devis
     */
    public function setDelaiContractuel($delaiContractuel)
    {
        $this->delaiContractuel = $delaiContractuel;
    
        return $this;
    }

    /**
     * Get delaiContractuel
     *
     * @return integer 
     */
    public function getDelaiContractuel()
    {
        return $this->delaiContractuel;
    }

    /**
     * Set chronoDevis
     *
     * @param string $chronoDevis
     * @return Devis
     */
    public function setChronoDevis($chronoDevis)
    {
        $this->chronoDevis = $chronoDevis;
    
        return $this;
    }

    /**
     * Get chronoDevis
     *
     * @return string 
     */
    public function getChronoDevis()
    {
        return $this->chronoDevis;
    }

    /**
     * Set montantHT
     *
     * @param float $montantHT
     * @return Devis
     */
    public function setMontantHT($montantHT)
    {
        $this->montantHT = $montantHT;
    
        return $this;
    }

    /**
     * Get montantHT
     *
     * @return float 
     */
    public function getMontantHT()
    {
        return $this->montantHT;
    }

    /**
     * Set montantTVANormale
     *
     * @param float $montantTVANormale
     * @return Devis
     */
    public function setMontantTVANormale($montantTVANormale)
    {
        $this->montantTVANormale = $montantTVANormale;
    
        return $this;
    }

    /**
     * Get montantTVANormale
     *
     * @return float 
     */
    public function getMontantTVANormale()
    {
        return $this->montantTVANormale;
    }

    /**
     * Set montantTVAReduite
     *
     * @param float $montantTVAReduite
     * @return Devis
     */
    public function setMontantTVAReduite($montantTVAReduite)
    {
        $this->montantTVAReduite = $montantTVAReduite;
    
        return $this;
    }

    /**
     * Get montantTVAReduite
     *
     * @return float 
     */
    public function getMontantTVAReduite()
    {
        return $this->montantTVAReduite;
    }

    /**
     * Set modeReglement
     *
     * @param string $modeReglement
     * @return Devis
     */
    public function setModeReglement($modeReglement)
    {
        $this->modeReglement = $modeReglement;
    
        return $this;
    }

    /**
     * Get modeReglement
     *
     * @return string 
     */
    public function getModeReglement()
    {
        return $this->modeReglement;
    }

    /**
     * Set remiseAccordee
     *
     * @param float $remiseAccordee
     * @return Devis
     */
    public function setRemiseAccordee($remiseAccordee)
    {
        $this->remiseAccordee = $remiseAccordee;
    
        return $this;
    }

    /**
     * Get remiseAccordee
     *
     * @return float 
     */
    public function getRemiseAccordee()
    {
        return $this->remiseAccordee;
    }

    /**
     * Add cees
     *
     * @param \Oreha\ErpBundle\Entity\CEE $cees
     * @return Devis
     */
    public function addCee(\Oreha\ErpBundle\Entity\CEE $cees)
    {
        $this->cees[] = $cees;
    
        return $this;
    }

    /**
     * Remove cees
     *
     * @param \Oreha\ErpBundle\Entity\CEE $cees
     */
    public function removeCee(\Oreha\ErpBundle\Entity\CEE $cees)
    {
        $this->cees->removeElement($cees);
    }

    /**
     * Get cees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCees()
    {
        return $this->cees;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Devis
     */
    public function setDossier(\Oreha\ErpBundle\Entity\Dossier $dossier)
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
     * Set realisePar
     *
     * @param \Oreha\UserBundle\Entity\User $realisePar
     * @return Devis
     */
    public function setRealisePar(\Oreha\UserBundle\Entity\User $realisePar = null)
    {
        $this->realisePar = $realisePar;
    
        return $this;
    }

    /**
     * Get realisePar
     *
     * @return \Oreha\UserBundle\Entity\User 
     */
    public function getRealisePar()
    {
        return $this->realisePar;
    }
}
