<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Pret
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\PretRepository")
 */
class Pret extends ElementModifiable
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", nullable=true)
     */
    private $montant;

    /**
     * @var float
     *
     * @ORM\Column(name="taux", type="float", nullable=true)
     */
    private $taux;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="dateAccepte", type="date", nullable=true)
     */
    private $dateAccepte;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRefus", type="date", nullable=true)
     */
    private $dateRefus;

    /**
     * @var string
     *
     * @ORM\Column(name="banque", type="string", length=255, nullable=true)
     */
    private $banque;
    
    /**
     * @ORM\OneToOne(targetEntity="Oreha\ErpBundle\Entity\Rib")
     * @ORM\JoinColumn(name="rib_id", referencedColumnName="id")
     */
    private $rib;
    
    /**
     * @var Oreha\ErpBundle\Entity\Dossier 
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="prets" )
     * @ORM\JoinColumn(name="dossier_id", nullable=false)
     */
    private $dossier;
    
    // METHODES PERSO
     
    public function __construct() {
        $this->dateRefus = null;
        $this->dateAccepte = null;
    }
     
    /**
     * @return boolean
     */
    public function isRefuse(){
        if($this->getDateRefus() != null){
            return true;
        }
        else {
            return false;
        }
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
     * Set nom
     *
     * @param string $nom
     * @return Pret
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
     * @return Pret
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
     * Set taux
     *
     * @param float $taux
     * @return Pret
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;

        return $this;
    }

    /**
     * Get taux
     *
     * @return float 
     */
    public function getTaux()
    {
        return $this->taux;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Pret
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
     * Set banque
     *
     * @param string $banque
     * @return Pret
     */
    public function setBanque($banque)
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * Get banque
     *
     * @return string 
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * Set rib
     *
     * @param \Oreha\ErpBundle\Entity\Rib $rib
     * @return Pret
     */
    public function setRib(\Oreha\ErpBundle\Entity\Rib $rib = null)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return \Oreha\ErpBundle\Entity\Rib 
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Pret
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
     * Set dateAccepte
     *
     * @param \DateTime $dateAccepte
     * @return Pret
     */
    public function setDateAccepte($dateAccepte)
    {
        $this->dateAccepte = $dateAccepte;

        return $this;
    }

    /**
     * Get dateAccepte
     *
     * @return \DateTime 
     */
    public function getDateAccepte()
    {
        return $this->dateAccepte;
    }

    /**
     * Set dateRefus
     *
     * @param \DateTime $dateRefus
     * @return Pret
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
}
