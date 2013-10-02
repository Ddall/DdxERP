<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * CEE
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CEE extends ElementModifiable
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", nullable=true)
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDemande", type="date", nullable=true)
     */
    private $dateDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnvoiInstruction", type="date", nullable=true)
     */
    private $dateEnvoiInstruction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetourInstruction", type="date", nullable=true)
     */
    private $dateRetourInstruction;

    /**
     * @var string
     *
     * @ORM\Column(name="retourInstruction", type="string", length=255, nullable=true)
     */
    private $retourInstruction;

    /**
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\FamilleCEE")
     * @ORM\JoinColumn(name="famillecee_id", referencedColumnName="id", nullable=false)
     */
    private $familleCEE;

    /**
     * @var Oreha\ErpBundle\Entity\Devis 
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Devis", inversedBy="cees" )
     * @ORM\JoinColumn(name="devis_id", nullable=false)
     */
    private $devis;
    
    
 

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
     * Set nom
     *
     * @param string $nom
     * @return CEE
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set montant
     *
     * @param float $montant
     * @return CEE
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     * @return CEE
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime 
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set dateEnvoiInstruction
     *
     * @param \DateTime $dateEnvoiInstruction
     * @return CEE
     */
    public function setDateEnvoiInstruction($dateEnvoiInstruction)
    {
        $this->dateEnvoiInstruction = $dateEnvoiInstruction;

        return $this;
    }

    /**
     * Get dateEnvoiInstruction
     *
     * @return \DateTime 
     */
    public function getDateEnvoiInstruction()
    {
        return $this->dateEnvoiInstruction;
    }

    /**
     * Set dateRetourInstruction
     *
     * @param \DateTime $dateRetourInstruction
     * @return CEE
     */
    public function setDateRetourInstruction($dateRetourInstruction)
    {
        $this->dateRetourInstruction = $dateRetourInstruction;

        return $this;
    }

    /**
     * Get dateRetourInstruction
     *
     * @return \DateTime 
     */
    public function getDateRetourInstruction()
    {
        return $this->dateRetourInstruction;
    }

    /**
     * Set retourInstruction
     *
     * @param string $retourInstruction
     * @return CEE
     */
    public function setRetourInstruction($retourInstruction)
    {
        $this->retourInstruction = $retourInstruction;

        return $this;
    }

    /**
     * Get retourInstruction
     *
     * @return string 
     */
    public function getRetourInstruction()
    {
        return $this->retourInstruction;
    }

    /**
     * Set familleCEE
     *
     * @param \Oreha\ErpBundle\Entity\FamilleCEE $familleCEE
     * @return CEE
     */
    public function setFamilleCEE(\Oreha\ErpBundle\Entity\FamilleCEE $familleCEE)
    {
        $this->familleCEE = $familleCEE;

        return $this;
    }

    /**
     * Get familleCEE
     *
     * @return \Oreha\ErpBundle\Entity\FamilleCEE 
     */
    public function getFamilleCEE()
    {
        return $this->familleCEE;
    }

    /**
     * Set devis
     *
     * @param \Oreha\ErpBundle\Entity\Devis $devis
     * @return CEE
     */
    public function setDevis(\Oreha\ErpBundle\Entity\Devis $devis)
    {
        $this->devis = $devis;

        return $this;
    }

    /**
     * Get devis
     *
     * @return \Oreha\ErpBundle\Entity\Devis 
     */
    public function getDevis()
    {
        return $this->devis;
    }
}
