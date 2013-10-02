<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telephone
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\TelephoneRepository")
 */
class Telephone
{
    /**
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Contact", inversedBy="telephones")
     * @Orm\JoinColumn(nullable=false)
     */
    private $contact;
    
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
     * @ORM\Column(name="numero", type="string", length=15)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;


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
     * Set numero
     *
     * @param string $numero
     * @return Telephone
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Telephone
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
     * Set contact
     *
     * @param \Oreha\ErpBundle\Entity\Contact $contact
     * @return Telephone
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
}
