<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable; 

/**
 * Bien
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\BienRepository")
 */
class Bien extends ElementModifiable
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
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="biens")
     * @ORM\JoinColumn(nullable=false, name="dossier_id", referencedColumnName="id")
     */
    protected $dossier;
    
    /**
     * @ORM\OneToOne(targetEntity="Oreha\ErpBundle\Entity\Adresse", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $adresse;

    /**
     * @var float
     *
     * @ORM\Column(name="surface", type="float", nullable=true)
     */
    private $surface;

    /**
     * @var string 
     * @ORM\Column(name="type", type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @var integer
     * @ORM\Column(name="anneeConstruction", type="integer", nullable=true)
     */
    private $anneeConstruction;
    
    /**
     * @var string
     * @ORM\Column(name="typeChauffage", type="string", length=50, nullable=true)
     */
    private $typeChauffage;
    
    /**
     * @var string
     * @ORM\Column(name="typeEauChaude", type="string", length=50, nullable=true)
     */
    private $typeEauChaude;

    /**
     * @var boolean
     * @ORM\Column(name="dejaEuTravaux", type="boolean")
     */
    private $dejaEuTravaux;

    /**
     * @var text
     * @ORM\Column(name="travauxRealises", type="text", nullable=true)
     */
    private $travauxRealises;

    /**
     * @var string
     * @ORM\Column(name="dateTravauxRealises", type="string", nullable=true, length=50)
     */
    private $dateTravauxRealises;
    
    /**
     * @var integer
     * @ORM\Column(name="valeurAvantTravaux", type="integer", nullable=true)
     */
    private $valeurAvantTravaux;
    
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
     * Set surface
     *
     * @param float $surface
     * @return Bien
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return float 
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Bien
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set anneeConstruction
     *
     * @param integer $anneeConstruction
     * @return Bien
     */
    public function setAnneeConstruction($anneeConstruction)
    {
        $this->anneeConstruction = $anneeConstruction;

        return $this;
    }

    /**
     * Get anneeConstruction
     *
     * @return integer 
     */
    public function getAnneeConstruction()
    {
        return $this->anneeConstruction;
    }

    /**
     * Set typeChauffage
     *
     * @param string $typeChauffage
     * @return Bien
     */
    public function setTypeChauffage($typeChauffage)
    {
        $this->typeChauffage = $typeChauffage;

        return $this;
    }

    /**
     * Get typeChauffage
     *
     * @return string 
     */
    public function getTypeChauffage()
    {
        return $this->typeChauffage;
    }

    /**
     * Set typeEauChaude
     *
     * @param string $typeEauChaude
     * @return Bien
     */
    public function setTypeEauChaude($typeEauChaude)
    {
        $this->typeEauChaude = $typeEauChaude;

        return $this;
    }

    /**
     * Get typeEauChaude
     *
     * @return string 
     */
    public function getTypeEauChaude()
    {
        return $this->typeEauChaude;
    }

    /**
     * Set dejaEuTravaux
     *
     * @param boolean $dejaEuTravaux
     * @return Bien
     */
    public function setDejaEuTravaux($dejaEuTravaux)
    {
        $this->dejaEuTravaux = $dejaEuTravaux;

        return $this;
    }

    /**
     * Get dejaEuTravaux
     *
     * @return boolean 
     */
    public function getDejaEuTravaux()
    {
        return $this->dejaEuTravaux;
    }

    /**
     * Set travauxRealises
     *
     * @param string $travauxRealises
     * @return Bien
     */
    public function setTravauxRealises($travauxRealises)
    {
        $this->travauxRealises = $travauxRealises;

        return $this;
    }

    /**
     * Get travauxRealises
     *
     * @return string 
     */
    public function getTravauxRealises()
    {
        return $this->travauxRealises;
    }

    /**
     * Set dateTravauxRealises
     *
     * @param string $dateTravauxRealises
     * @return Bien
     */
    public function setDateTravauxRealises($dateTravauxRealises)
    {
        $this->dateTravauxRealises = $dateTravauxRealises;

        return $this;
    }

    /**
     * Get dateTravauxRealises
     *
     * @return string 
     */
    public function getDateTravauxRealises()
    {
        return $this->dateTravauxRealises;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Bien
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
     * Set adresse
     *
     * @param \Oreha\ErpBundle\Entity\Adresse $adresse
     * @return Bien
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
     * Set valeurAvantTravaux
     *
     * @param integer $valeurAvantTravaux
     * @return Bien
     */
    public function setValeurAvantTravaux($valeurAvantTravaux)
    {
        $this->valeurAvantTravaux = $valeurAvantTravaux;

        return $this;
    }

    /**
     * Get valeurAvantTravaux
     *
     * @return integer 
     */
    public function getValeurAvantTravaux()
    {
        return $this->valeurAvantTravaux;
    }
}
