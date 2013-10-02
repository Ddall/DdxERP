<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Rendezvous
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\RendezvousRepository")
 */
class Rendezvous extends ElementModifiable
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
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    
    /**
     * @var Oreha\ErpBundle\Entity\Adresse 
     * @ORM\OneToOne( targetEntity="Oreha\ErpBundle\Entity\Adresse", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $lieu;
    
    /**
     * @var Oreha\ErpBundle\Entity\Contact
     * @ORM\ManyToOne( targetEntity="Oreha\ErpBundle\Entity\Contact" )
     * @ORM\JoinColumn( nullable=false, name="contact_id", referencedColumnName="id" )
     */
    private $contact;
    
    /**
     * @var Oreha\UserBundle\Entity\User
     * @ORM\ManyToOne( targetEntity="Oreha\UserBundle\Entity\User" )
     * @ORM\JoinColumn(name="user_id", nullable=false, referencedColumnName="id" )
     */
    private $user;
    
    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @var Oreha\ErpBundle\Entity\Dossier 
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Dossier", inversedBy="rendezvouss" )
     * @ORM\JoinColumn(name="dossier_id", nullable=false)
     */
    private $dossier;
            
    // ------------------ PERSO
    
     /**
      * 
      * @param \DateTime $time
      */
    public function setTime($time){
        $new = new \DateTime($this->getDate()->format('d/m/y') . ' ' .$time->format('H:i') );
        $this->setDate( $new  );
        
        return $this;
    }
    
    /**
     * 
     * @return boolean
     */
    public function isPast(){
       if($this->date > new \DateTime('now') ){
           return false;
       }else{
           return true;
       }
    }
     
    // ------------------  AUTO
            
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
     * @return Rendezvous
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
     * Set type
     *
     * @param string $type
     * @return Rendezvous
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
     * Set lieu
     *
     * @param \Oreha\ErpBundle\Entity\Adresse $lieu
     * @return Rendezvous
     */
    public function setLieu(\Oreha\ErpBundle\Entity\Adresse $lieu = null)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return \Oreha\ErpBundle\Entity\Adresse 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set contacts
     *
     * @param \Oreha\ErpBundle\Entity\Contact $contacts
     * @return Rendezvous
     */
    public function setContacts(\Oreha\ErpBundle\Entity\Contact $contacts)
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * Get contacts
     *
     * @return \Oreha\ErpBundle\Entity\Contact 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set users
     *
     * @param \Oreha\UserBundle\Entity\User $users
     * @return Rendezvous
     */
    public function setUsers(\Oreha\UserBundle\Entity\User $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \Oreha\UserBundle\Entity\User 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set dossier
     *
     * @param \Oreha\ErpBundle\Entity\Dossier $dossier
     * @return Rendezvous
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
     * Set description
     *
     * @param string $description
     * @return Rendezvous
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
     * Set contact
     *
     * @param \Oreha\ErpBundle\Entity\Contact $contact
     * @return Rendezvous
     */
    public function setContact(\Oreha\ErpBundle\Entity\Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \Oreha\ErpBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set user
     *
     * @param \Oreha\UserBundle\Entity\User $user
     * @return Rendezvous
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
