<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;
/**
 * Facture
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\FactureRepository")
 */
class Facture extends ElementModifiable
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
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="factures" )
     * @ORM\JoinColumn(name="dossier_id", nullable=false)
     */
    private $dossier;

    /**
     * @var float
     *
     * @ORM\Column(name="montantHT", type="float", nullable=true)
     */
    private $montantHT;

    /**
     * @var float
     *
     * @ORM\Column(name="montantTVAReduite", type="float", nullable=true)
     */
    private $montantTVAReduite;

    /**
     * @var float
     *
     * @ORM\Column(name="montantTVANormale", type="float", nullable=true)
     */
    private $montantTVANormale;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="chronoFacture", type="string", length=20, nullable=true)
     */
    private $chronoFacture;

    
    /**
     * @var \DateTime 
     * @ORM\Column(name="echeance", type="date", nullable=true)
     */
    private $echeance;
    
    // --------- METHODES PERSO ---------
    
    /**
     * @return \Datetime
     */
    public function getDate(){
        return $this->getDateCreation();
    }
    
    /**
     * @return float
     */
    public function getMontantTotal(){
        return $this->getMontantHT() + $this->getMontantTVANormale() + $this->getMontantTVAReduite();
    }
    
    /**
     * @return float
     */
    public function getMontantTTC(){
        return $this->getMontantTotal();
    }
    
    // --------- METHODES AUTO ---------

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
     * Set montantHT
     *
     * @param float $montantHT
     * @return Facture
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
     * Set montantTVAReduite
     *
     * @param float $montantTVAReduite
     * @return Facture
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
     * Set montantTVANormale
     *
     * @param float $montantTVANormale
     * @return Facture
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
     * Set libelle
     *
     * @param string $libelle
     * @return Facture
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set echeance
     *
     * @param \DateTime $echeance
     * @return Facture
     */
    public function setEcheance($echeance)
    {
        $this->echeance = $echeance;
    
        return $this;
    }

    /**
     * Get echeance
     *
     * @return \DateTime 
     */
    public function getEcheance()
    {
        return $this->echeance;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Facture
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
     * Set chronoFacture
     *
     * @param string $chronoFacture
     * @return Facture
     */
    public function setChronoFacture($chronoFacture)
    {
        $this->chronoFacture = $chronoFacture;
    
        return $this;
    }

    /**
     * Get chronoFacture
     *
     * @return string 
     */
    public function getChronoFacture()
    {
        return $this->chronoFacture;
    }
}
