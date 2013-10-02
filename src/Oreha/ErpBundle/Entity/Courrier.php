<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Courrier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\CourrierRepository")
 */
class Courrier extends ElementModifiable
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
     * @ORM\Column(name="corps", type="text")
     */
    private $corps;

    /**
     * @var string
     * 
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="element", type="string", length=20)
     */
    private $element;

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
     * Set corps
     *
     * @param string $corps
     * @return Courrier
     */
    public function setCorps($corps)
    {
        $this->corps = $corps;

        return $this;
    }

    /**
     * Get corps
     *
     * @return string 
     */
    public function getCorps()
    {
        return $this->corps;
    }

    /**
     * Set element
     *
     * @param string $element
     * @return Courrier
     */
    public function setElement($element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * Get element
     *
     * @return string 
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Courrier
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }
}
