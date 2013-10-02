<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Source
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\SourceRepository")
 */
class Source extends ElementModifiable
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
     * @var boolean
     *
     * @ORM\Column(name="desactive", type="boolean", nullable=true)
     */
    private $desactive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;
    
    /**
     * @var 
     * @ORM\Column( name="type", type="string", length=30, nullable=false )
     */
    private $type;

    // ------------------ METHODES PERSO
    
    public function getIntitule(){
        return $this->getNom();
    }
    
    // ----------------- VALIDATOR
    
    public function getTypes(){
        return array(
                'salon' => 'Salon',
                'internet' => 'Site internet',
                'technicommercial' => 'Technico Commercial',
                'autre' => 'Autre'
        );
    }

    // ----------------- METHODES AUTO
    
   

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
     * @return Source
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
     * Set desactive
     *
     * @param boolean $desactive
     * @return Source
     */
    public function setDesactive($desactive)
    {
        $this->desactive = $desactive;

        return $this;
    }

    /**
     * Get desactive
     *
     * @return boolean 
     */
    public function getDesactive()
    {
        return $this->desactive;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Source
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
     * @return Source
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
}
