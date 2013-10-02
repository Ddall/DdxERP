<?php

namespace Oreha\ErpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rib
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\RibRepository")
 */
class Rib
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
     * @ORM\Column(name="banque", type="string", length=5)
     */
    private $banque;

    /**
     * @var string
     *
     * @ORM\Column(name="gichet", type="string", length=5)
     */
    private $gichet;

    /**
     * @var string
     *
     * @ORM\Column(name="compte", type="string", length=11)
     */
    private $compte;

    /**
     * @var string
     *
     * @ORM\Column(name="cle", type="string", length=2)
     */
    private $cle;

    /**
     * @var string
     *
     * @ORM\Column(name="domiciliation", type="string", length=255)
     */
    private $domiciliation;

    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=27)
     */
    private $iban;

    /**
     * @var string
     *
     * @ORM\Column(name="bic", type="string", length=11)
     */
    private $bic;

    /**
     * @var string
     *
     * @ORM\Column(name="titulaire", type="string", length=255)
     */
    private $titulaire;


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
     * Set banque
     *
     * @param string $banque
     * @return Rib
     */
    public function setBanque($banque)
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * Get banque
     *
     * @return string 
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * Set gichet
     *
     * @param string $gichet
     * @return Rib
     */
    public function setGichet($gichet)
    {
        $this->gichet = $gichet;

        return $this;
    }

    /**
     * Get gichet
     *
     * @return string 
     */
    public function getGichet()
    {
        return $this->gichet;
    }

    /**
     * Set compte
     *
     * @param string $compte
     * @return Rib
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get compte
     *
     * @return string 
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set cle
     *
     * @param string $cle
     * @return Rib
     */
    public function setCle($cle)
    {
        $this->cle = $cle;

        return $this;
    }

    /**
     * Get cle
     *
     * @return string 
     */
    public function getCle()
    {
        return $this->cle;
    }

    /**
     * Set domiciliation
     *
     * @param string $domiciliation
     * @return Rib
     */
    public function setDomiciliation($domiciliation)
    {
        $this->domiciliation = $domiciliation;

        return $this;
    }

    /**
     * Get domiciliation
     *
     * @return string 
     */
    public function getDomiciliation()
    {
        return $this->domiciliation;
    }

    /**
     * Set iban
     *
     * @param string $iban
     * @return Rib
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string 
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set bic
     *
     * @param string $bic
     * @return Rib
     */
    public function setBic($bic)
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get bic
     *
     * @return string 
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Set titulaire
     *
     * @param string $titulaire
     * @return Rib
     */
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    /**
     * Get titulaire
     *
     * @return string 
     */
    public function getTitulaire()
    {
        return $this->titulaire;
    }
}
