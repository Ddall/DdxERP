<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\AdresseRepository")
 */
class Adresse
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
     * @ORM\Column(name="voie", type="string", length=255, nullable=true)
     */
    private $voie;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=255, nullable=true)
     */
    private $complement;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var float
     * @ORM\Column(name="latitude", type="float", nullable=true)
     */
    private $latitude;
    
    /**
     * @var float
     * @ORM\Column(name="longitude", type="float", nullable=true)
     */
    private $longitude;

    // -------------- PERSO
    
    /**
     * 
     * @return string
     */
    public function getFullAdresse(){
        $data = '';
        if($this->getVoie() != null) $data .= $this->getVoie();
        if($this->getComplement() != null) $data .= ' '. $this->getComplement();
        if($this->getCodePostal() != null) $data .= ' '. $this->getCodePostal();
        if($this->getVille() != null) $data .= ' '. $this->getVille();

        return $data;
    }
    
    public function __clone() {
        $this->id = null;
        
    }
    
    /**
     * 
     * @return string
     */
    public function __toString() {
        return getFullAdresse();
    }
    
    
    // ----------- AUTO
    

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
     * Set voie
     *
     * @param string $voie
     * @return Adresse
     */
    public function setVoie($voie)
    {
        $this->voie = $voie;

        return $this;
    }

    /**
     * Get voie
     *
     * @return string 
     */
    public function getVoie()
    {
        return $this->voie;
    }

    /**
     * Set complement
     *
     * @param string $complement
     * @return Adresse
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string 
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     * @return Adresse
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Adresse
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Adresse
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Adresse
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
