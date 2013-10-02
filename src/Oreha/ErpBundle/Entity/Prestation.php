<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Prestation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\PrestationRepository")
 */
class Prestation extends ElementModifiable
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
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\FamillePrestation")
     * @ORM\JoinColumn(name="famillePrestation_id", referencedColumnName="id", nullable=false)
     */
    protected $famille;

    
    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", nullable=true)
     */
    private $montant;
    
    /**
     * @var Oreha\ErpBundle\Entity\Dossier 
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="prestations" )
     * @ORM\JoinColumn(name="dossier_id", nullable=false)
     */
    private $dossier;
    
    /**
     * @ORM\ManyToOne(targetEntity="Oreha\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $realisePar;
    

    // -------- METHODES PERSO
    
    /**
     * 
     * @return boolean
     */
    public function isFree(){
        if($this->montant == null || $this->montant == 0){
            return true;
        }else{
            return false;
        }
    }
    
    // -------- METHODES AUTO
    
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
     * Set montant
     *
     * @param float $montant
     * @return Prestation
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
     * Set famille
     *
     * @param \Oreha\ErpBundle\Entity\FamillePrestation $famille
     * @return Prestation
     */
    public function setFamille(\Oreha\ErpBundle\Entity\FamillePrestation $famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return \Oreha\ErpBundle\Entity\FamillePrestation 
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Prestation
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
     * @return Prestation
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
