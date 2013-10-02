<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;
/**
 * Contact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\ContactRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Contact extends ElementModifiable
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
     * @ORM\Column(name="civilite", type="string", length=10, nullable=true)
     */
    private $civilite;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;
    
    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255, nullable=true)
     */
    private $societe;
    
    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\OneToOne(targetEntity="Oreha\ErpBundle\Entity\Adresse", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $adresse;
    
    /**
     * @ORM\OneToMany(targetEntity="Oreha\ErpBundle\Entity\Email", mappedBy="contact",cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $emails;
    
    /**
     * @ORM\OneToMany(targetEntity="Oreha\ErpBundle\Entity\Telephone", mappedBy="contact",cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $telephones;
    
    /**
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="contacts")
     * @Orm\JoinColumn(nullable=false)
     */
    private $dossier;
    
    // ------------- PERSO
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
        $this->telephones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * 
     * @return string
     */
    public function getFullName(){
        $fullname = '';
        
        if($this->getCivilite() != null) $fullname .= $this->getCivilite ();
        if($this->getPrenom() != null) $fullname .= ' ' .$this->getPrenom();
        if($this->getNom() != null) $fullname .= ' ' .$this->getNom();
        
        return $fullname;
    }
    
    /**
     * @ORM\PrePersist
     */
//    public function createContact() {
//        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->telephones = new \Doctrine\Common\Collections\ArrayCollection();
//    }

    /**
     * @ORM\preUpdate
     *  CallBack
     */
//    public function updateDate(){
//        $this->dateDerniereModif = new \DateTime('now');
//    }

    // ----------------- AUTO
  


  

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
     * @return Contact
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
     * Set prenom
     *
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Contact
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
     * Set societe
     *
     * @param string $societe
     * @return Contact
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;
    
        return $this;
    }

    /**
     * Get societe
     *
     * @return string 
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Contact
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
     * Set adresse
     *
     * @param \Oreha\ErpBundle\Entity\Adresse $adresse
     * @return Contact
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
     * Add emails
     *
     * @param \Oreha\ErpBundle\Entity\Email $emails
     * @return Contact
     */
    public function addEmail(\Oreha\ErpBundle\Entity\Email $emails)
    {
        $this->emails[] = $emails;
    
        return $this;
    }

    /**
     * Remove emails
     *
     * @param \Oreha\ErpBundle\Entity\Email $emails
     */
    public function removeEmail(\Oreha\ErpBundle\Entity\Email $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add telephones
     *
     * @param \Oreha\ErpBundle\Entity\Telephone $telephones
     * @return Contact
     */
    public function addTelephone(\Oreha\ErpBundle\Entity\Telephone $telephones)
    {
        $this->telephones[] = $telephones;
    
        return $this;
    }

    /**
     * Remove telephones
     *
     * @param \Oreha\ErpBundle\Entity\Telephone $telephones
     */
    public function removeTelephone(\Oreha\ErpBundle\Entity\Telephone $telephones)
    {
        $this->telephones->removeElement($telephones);
    }

    /**
     * Get telephones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelephones()
    {
        return $this->telephones;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Contact
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
     * Set civilite
     *
     * @param string $civilite
     * @return Contact
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    
        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }
}
