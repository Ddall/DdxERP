<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Oreha\ErpBundle\Entity\ElementModifiable;
/**
 * Echeance
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\EcheanceRepository")
 */
class Echeance extends ElementModifiable
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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
    /**
     * @var Oreha\ErpBundle\Entity\Dossier 
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="echeances" )
     * @ORM\JoinColumn(name="dossier_id", nullable=false)
     */
    private $dossier;
    
    /**
     *
     * @var Oreha\UserBundle\Entity\User 
     * @ORM\ManyToOne(targetEntity="Oreha\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;
    
    /**
     *
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     *
     * @var integer 
     * @ORM\Column( name="avancement", type="integer", nullable=true )
     */
    private $avancement;
        
    // AUTO

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
     * @return Echeance
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
     * Set libelle
     *
     * @param string $libelle
     * @return Echeance
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
     * Set description
     *
     * @param string $description
     * @return Echeance
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

    /**
     * Set avancement
     *
     * @param integer $avancement
     * @return Echeance
     */
    public function setAvancement($avancement)
    {
        if($avancement != null){
            $this->avancement = $avancement;
        }else{
            $this->avancement = 0;
        }
        

        return $this;
    }

    /**
     * Get avancement
     *
     * @return integer 
     */
    public function getAvancement()
    {
        return $this->avancement;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Echeance
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
     * Set user
     *
     * @param \Oreha\UserBundle\Entity\User $user
     * @return Echeance
     */
    public function setUser(\Oreha\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Oreha\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
