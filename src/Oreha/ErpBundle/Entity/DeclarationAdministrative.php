<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * DeclarationAdministrative
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\DeclarationAdministrativeRepository")
 */
class DeclarationAdministrative extends ElementModifiable
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
   /**
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\FamilleDeclaration")
     * @ORM\JoinColumn(name="familleDeclaration_id", referencedColumnName="id", nullable=false)
     */
    private $famille;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepot", type="date", nullable=true)
     */
    private $dateDepot;

    /**
     * @var \DateTime
     *
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
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;
    
        /**
     * @var Oreha\ErpBundle\Entity\Dossier 
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="declarations" )
     * @ORM\JoinColumn(name="dossier_id", nullable=false)
     */
    private $dossier;


    /**
     * @return string
     */
    public function getStatut(){
        if($this->getDateDepot() != null){
            return 'instruction';
        }
        if($this->getDateAccepte()){
            return 'accepte';
        }
        if($this->getDateRefus()){
            return 'refuse';
        }
        
        return 'pasdepose';
    }
    
    //-- METHODES AUTO


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
     * @return DeclarationAdministrative
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
     * Set dateDepot
     *
     * @param \DateTime $dateDepot
     * @return DeclarationAdministrative
     */
    public function setDateDepot($dateDepot)
    {
        $this->dateDepot = $dateDepot;
    
        return $this;
    }

    /**
     * Get dateDepot
     *
     * @return \DateTime 
     */
    public function getDateDepot()
    {
        return $this->dateDepot;
    }

    /**
     * Set dateAccepte
     *
     * @param \DateTime $dateAccepte
     * @return DeclarationAdministrative
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
     * @return DeclarationAdministrative
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
     * Set commentaire
     *
     * @param string $commentaire
     * @return DeclarationAdministrative
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    
        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set famille
     *
     * @param \Oreha\ErpBundle\Entity\FamilleDeclaration $famille
     * @return DeclarationAdministrative
     */
    public function setFamille(\Oreha\ErpBundle\Entity\FamilleDeclaration $famille)
    {
        $this->famille = $famille;
    
        return $this;
    }

    /**
     * Get famille
     *
     * @return \Oreha\ErpBundle\Entity\FamilleDeclaration 
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return DeclarationAdministrative
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
}
