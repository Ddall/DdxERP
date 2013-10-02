<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementReadOnly;

/**
 * Statut
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\StatutRepository")
 */
class Statut extends ElementReadOnly
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
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="statuts" )
     * @ORM\JoinColumn(name="dossier_id", nullable=false)
     */
    private $dossier;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=20)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="chr", type="string", length=5)
     */
    private $chr;

    /**
     * @var integer
     *
     * @ORM\Column(name="num", type="integer")
     */
    private $num;

    /**
     * @var float
     *
     * @ORM\Column(name="budget", type="float", nullable=true)
     */
    private $budget;

    /**
     * @var float
     *
     * @ORM\Column(name="chiffrage", type="float", nullable=true)
     */
    private $chiffrage;
    
    /**
     * @var Oreha\UserBundle\Entity\User 
     * @ORM\ManyToOne(targetEntity="Oreha\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $suiviPar;
    
    /**
     * @var \Datetime
     * @ORM\Column( name="transfered", nullable=true, type="datetime" )
     */
    private $transfered;
    
    
    /**
     * @var string
     * @ORM\Column( name="description", nullable=true, type="text" )
     */
    private $description;

    
    // --------- PERSO
    
    /**
     * 
     * @return string
     */
    public function getCode(){
        return $this->getChr() . $this->getNum();
    }
    

    //------------- AUTO


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
     * Set libelle
     *
     * @param string $libelle
     * @return Statut
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
     * Set chr
     *
     * @param string $chr
     * @return Statut
     */
    public function setChr($chr)
    {
        $this->chr = $chr;

        return $this;
    }

    /**
     * Get chr
     *
     * @return string 
     */
    public function getChr()
    {
        return $this->chr;
    }

    /**
     * Set num
     *
     * @param integer $num
     * @return Statut
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set budget
     *
     * @param float $budget
     * @return Statut
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return float 
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set chiffrage
     *
     * @param float $chiffrage
     * @return Statut
     */
    public function setChiffrage($chiffrage)
    {
        $this->chiffrage = $chiffrage;

        return $this;
    }

    /**
     * Get chiffrage
     *
     * @return float 
     */
    public function getChiffrage()
    {
        return $this->chiffrage;
    }

    /**
     * Set transfered
     *
     * @param \DateTime $transfered
     * @return Statut
     */
    public function setTransfered($transfered)
    {
        $this->transfered = $transfered;

        return $this;
    }

    /**
     * Get transfered
     *
     * @return \DateTime 
     */
    public function getTransfered()
    {
        return $this->transfered;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Statut
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
     * Set suiviPar
     *
     * @param \Oreha\UserBundle\Entity\User $suiviPar
     * @return Statut
     */
    public function setSuiviPar(\Oreha\UserBundle\Entity\User $suiviPar)
    {
        $this->suiviPar = $suiviPar;

        return $this;
    }

    /**
     * Get suiviPar
     *
     * @return \Oreha\UserBundle\Entity\User 
     */
    public function getSuiviPar()
    {
        return $this->suiviPar;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Statut
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
