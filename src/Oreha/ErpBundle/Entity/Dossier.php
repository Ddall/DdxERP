<?php
namespace Oreha\ErpBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

use Oreha\ErpBundle\Entity\ElementModifiable;

/**
 * Dossier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Oreha\ErpBundle\Entity\DossierRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Dossier extends ElementModifiable
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
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    private $intitule;
    
    /**
     * @var string
     * @ORM\Column(name="typeDossier", type="string", length=20)
     */
    private $typeDossier;
    
    /**
     * @var \Datetime
     * 
     * @ORM\Column(name="dateCloture", type="datetime", nullable=true)
     */
    private $dateCloture;
    
    /**
     * @var string
     * @ORM\Column(name="raisonCloture", type="text", nullable=true)
     */
    private $raisonCloture;
    
    /**
     * @var text
     * 
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @var boolean
     * @ORM\Column(name="supprime", type="boolean")
     */
    private $supprime;
    
    /**
     * @var string
     * @ORM\Column(name="appreciation", type="string", length=20, nullable=true)
     */
    private $appreciation;
    
    /**
     * @var Oreha\ErpBundle\Entity\Contact
     * @ORM\OneToMany(targetEntity="Oreha\ErpBundle\Entity\Contact", cascade={"persist", "remove"}, mappedBy="dossier", orphanRemoval=true)
     */
    private $contacts;
    
    /**
     * @var Oreha\ErpBundle\Entity\Bien
     * @ORM\OneToMany(targetEntity="Oreha\ErpBundle\Entity\Bien", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $biens;

    /**
     * 
     * @var Oreha\ErpBundle\Entity\Commentaire
     * @ORM\ManyToMany(targetEntity="Oreha\ErpBundle\Entity\Commentaire", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinTable(name="dossier_commentaires", 
     *              joinColumns={ @ORM\JoinColumn(name="dossier_id", referencedColumnName="id") }, 
     *              inverseJoinColumns={ @ORM\JoinColumn(name="commentaire_id", referencedColumnName="id") }
     *      )
     */
    protected $commentaires;

    /**
     * @var Ohera\ErpBundle\Entity\Statut
     * @ORM\OneToMany(targetEntity="Oreha\ErpBundle\Entity\Statut", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    protected $statuts;
    
    /**
     * @var Oreha\ErpBundle\Entity\Echeance
     * @ORM\OneToMany(targetEntity="Oreha\ErpBundle\Entity\Echeance", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"date" = "DESC"})
     */
    private $echeances;
    
    /**
     * Oui, rendez vous avec deux S ... (Doctrine a besoin d'un 'pluriel'...)
     * @var Oreha\ErpBundle\Entity\Rendezvous
     * @ORM\OneToMany( targetEntity="Oreha\ErpBundle\Entity\Rendezvous", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy( { "date"="DESC" } )
     */
    protected $rendezvouss;
    
    /**
     * @ORM\ManyToOne(targetEntity="Oreha\ErpBundle\Entity\Source")
     * @ORM\JoinColumn(name="source_id", referencedColumnName="id", nullable=true)
     */
    protected $source;
    
    /**
     * @var Oreha\ErpBundle\Entity\Pret 
     * @ORM\OneToMany( targetEntity="Oreha\ErpBundle\Entity\Pret", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $prets;
    
    /**
     * @var Oreha\ErpBundle\Entity\Devis
     * @ORM\OneToMany( targetEntity="Oreha\ErpBundle\Entity\Devis", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $deviss;
    
    /**
     * LISTE DES UTILISATEURS POUVANT VOIR LE DOSSIER
     * @var Oreha\UserBundle\Entity\User
     * @ORM\ManyToMany(targetEntity="Oreha\UserBundle\Entity\User", inversedBy="dossiers")
     * @ORM\JoinTable(name="dossiers_users", 
     *              joinColumns={ @ORM\JoinColumn(name="dossier_id", referencedColumnName="id") }, 
     *              inverseJoinColumns={ @ORM\JoinColumn(name="user_id", referencedColumnName="id") }
     *      )
     */
     
    private $users;
    
    
    /**
     * @var Oreha\ErpBundle\Entity\Prestation
     * @ORM\OneToMany( targetEntity="Oreha\ErpBundle\Entity\Prestation", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $prestations;
    
    
    /**
     * @var Oreha\ErpBundle\Entity\DeclarationAdministrative
     * @ORM\OneToMany( targetEntity="Oreha\ErpBundle\Entity\DeclarationAdministrative", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $declarations;
    
    /**
     * PSEUDO CONTRAINTE POUR SIMPLIFIER LES RECHERCHES, IL Y A PROPABLEMENT UNE MEILLEURE FACON DE FAIRE CECI
     * @var integer
     * @ORM\Column(name="client_id", type="integer", nullable=true) 
     */
    private $client_id;
    
    
    /**
     * @var Oreha\ErpBundle\Entity\Facture
     * @ORM\OneToMany( targetEntity="Oreha\ErpBundle\Entity\Facture", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $factures;
    
    /**
     * @var Oreha\ErpBundle\Entity\Payement
     * @ORM\OneToMany( targetEntity="Oreha\ErpBundle\Entity\Payement", mappedBy="dossier", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $payements;
       
    //-------------- METHODES PERSONNELLES
    
    /**
     * __CTOR
     */
    public function __construct() {
        $this->contacts = new ArrayCollection();
        $this->biens = new ArrayCollection();
        $this->statuts = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->prets = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->declarations = new ArrayCollection();
        $this->prestations = new ArrayCollection();
        $this->supprime = false;
        $this->client_id = null;
        
    }
    
    /**
     * @ORM\PrePersist
     */
//    public function createDossier(){
        // ATTENTION: VERIFIER OrehaErpBundle:EventListener:EntityOwnerListener AVANT DE MODIFIER ICI
//        $this->chrono = date('Ym'); // OBLIGATOIRE POUR L'INTEGRITE
//        $this->dateCreation = new \DateTime('now');
//        $this->dateDerniereModif = new \DateTime('now');
//        $this->dateCloture = null;
//        $this->supprime = false;
//    }
    
    /**
     * Get chrono
     * Le chrono est construit à partir de la date de creation et de l'ID
     * @return string 
     */
    public function getChrono()
    {
        return $this->getDateCreation()->format('Ym') . $this->getId();
    }
    
    /**
     * Retourne le dernier statut du dossier;
     * @return Oreha\ErpBundle\Entity\Statut
     */
    public function getStatut(){
        return $this->getStatuts()->first();
    }
    
    /**
     * Recupère l'utilisateur chargé du dossier
     * @return User
     */
    public function getResponsable(){
       return $this->getStatuts()->last()->getSuiviPar();
    }
        
    
    public function clearUsers(){
        $this->users = new ArrayCollection();
        $this->getUsers()->add( $this->getCreateur() );
        
    }
    
    /**
     * Recharge les permissions du dossier
     * @ORM\PreUpdate
     */
    public function reloadUsers(){
        $users = new ArrayCollection();
        
        $users->add( $this->getCreateur() );
        
        
        foreach($this->getStatuts() AS $statut){
            if( !($users->contains( $statut->getSuiviPar() ) ) ){
                
                $users->add( $statut->getSuiviPar() );
            }
            
            if( !( $users->contains( $statut->getCreateur() ) )){
                $users->add($statut->getCreateur());
            }
        }
        
        $this->users = $users;
    }
    
    /**
     * Methode d'aide pour recuperer les id des utilisateurs qui ont le droit de voir le dossier
     * @return Array
     */
    public function getUsersid(){
        $r =  array();
        foreach($this->users AS $user){
            $r[] = $user->getId();
        }
        return $r;
    }
    

    /**
     * @return float
     */
    public function getMontantTotalPrets(){
        $montant = 0;
        foreach($this->getPrets() AS $pret){
            if(!$pret->isRefuse()){
                $montant += $pret->getMontant();
            }
        }
        return $montant;
        
    }
    
    /**
     * @return integer
     */
    public function getMontantTotalPrestations(){
        $montant = 0;
        
        foreach($this->getPrestations() AS $prestation){
            if(!$prestation->isFree() ){
                $montant += $prestation->getMontant();
            }
        }
        return $montant;
    }

    /**
     * @return float
     */
    public function getMontantTotalMarcheHT(){
        $montant = 0;
        
        foreach($this->getDeviss() AS $devis){
            if($devis->getDateSignature() != null){
                $montant += $devis->getMontantHT();
            }
        }
        
        return $montant;
    }
    
    /**
     * @return float
     */
    public function getMontantMarcheTTC(){
        $mt = 0;
        
        foreach($this->getDeviss() AS $devis){
            if($devis->getDateSignature() != null && $devis->getDateRefus() == null){
                $mt += $devis->getMontantTTC();
            }
        }
        
        return $mt;
    }
    
    /**
     * 
     * @return float
     */
    public function getMontantMarcheTVAReduite(){
        $mt = 0;
        
        foreach($this->getDeviss() AS $devis){
            if($devis->getDateSignature() != null && $devis->getDateRefus() == null){
                $mt += $devis->getMontantTVAReduite();
            }
        }
        
        return $mt;
    }
    
    /**
     * 
     * @return float
     */
    public function getMontantMarcheTVANormale(){
        $mt = 0;
        
        foreach($this->getDeviss() AS $devis){
            if($devis->getDateSignature() != null && $devis->getDateRefus() == null){
                $mt += $devis->getMontantTVANormale();
            }
        }
        return $mt;
    }
    
    /**
     * @return float
     */
    public function getTotalFacture(){
        $mt = 0;
        foreach($this->getFactures() AS $facture){
            $mt += $facture->getMontantTTC();
        }
        return $mt;
    }
    
    /**
     * @return foat
     */
    public function getTotalPaye(){
        $mt = 0;
        foreach($this->getPayements() AS $payement){
            $mt += $payement->getMontant();
        }
        return $mt;
    }
    
    /**
     * @return float
     */
    public function getBalanceFacturation(){
        return $this->getTotalPaye() - $this->getTotalFacture();
    }
    
    // ---------- METHODES GENEREES AUTOMATIQUEMENT
  

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
     * Set intitule
     *
     * @param string $intitule
     * @return Dossier
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set typeDossier
     *
     * @param string $typeDossier
     * @return Dossier
     */
    public function setTypeDossier($typeDossier)
    {
        $this->typeDossier = $typeDossier;
    
        return $this;
    }

    /**
     * Get typeDossier
     *
     * @return string 
     */
    public function getTypeDossier()
    {
        return $this->typeDossier;
    }

    /**
     * Set dateCloture
     *
     * @param \DateTime $dateCloture
     * @return Dossier
     */
    public function setDateCloture($dateCloture)
    {
        $this->dateCloture = $dateCloture;
    
        return $this;
    }

    /**
     * Get dateCloture
     *
     * @return \DateTime 
     */
    public function getDateCloture()
    {
        return $this->dateCloture;
    }

    /**
     * Set raisonCloture
     *
     * @param string $raisonCloture
     * @return Dossier
     */
    public function setRaisonCloture($raisonCloture)
    {
        $this->raisonCloture = $raisonCloture;
    
        return $this;
    }

    /**
     * Get raisonCloture
     *
     * @return string 
     */
    public function getRaisonCloture()
    {
        return $this->raisonCloture;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Dossier
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
     * Set supprime
     *
     * @param boolean $supprime
     * @return Dossier
     */
    public function setSupprime($supprime)
    {
        $this->supprime = $supprime;
    
        return $this;
    }

    /**
     * Get supprime
     *
     * @return boolean 
     */
    public function getSupprime()
    {
        return $this->supprime;
    }

    /**
     * Set appreciation
     *
     * @param string $appreciation
     * @return Dossier
     */
    public function setAppreciation($appreciation)
    {
        $this->appreciation = $appreciation;
    
        return $this;
    }

    /**
     * Get appreciation
     *
     * @return string 
     */
    public function getAppreciation()
    {
        return $this->appreciation;
    }

    /**
     * Set client_id
     *
     * @param integer $clientId
     * @return Dossier
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;
    
        return $this;
    }

    /**
     * Get client_id
     *
     * @return integer 
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Add contacts
     *
     * @param \Oreha\ErpBundle\Entity\Contact $contacts
     * @return Dossier
     */
    public function addContact(\Oreha\ErpBundle\Entity\Contact $contacts)
    {
        $this->contacts[] = $contacts;
    
        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \Oreha\ErpBundle\Entity\Contact $contacts
     */
    public function removeContact(\Oreha\ErpBundle\Entity\Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Add biens
     *
     * @param \Oreha\ErpBundle\Entity\Bien $biens
     * @return Dossier
     */
    public function addBien(\Oreha\ErpBundle\Entity\Bien $biens)
    {
        $this->biens[] = $biens;
    
        return $this;
    }

    /**
     * Remove biens
     *
     * @param \Oreha\ErpBundle\Entity\Bien $biens
     */
    public function removeBien(\Oreha\ErpBundle\Entity\Bien $biens)
    {
        $this->biens->removeElement($biens);
    }

    /**
     * Get biens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBiens()
    {
        return $this->biens;
    }

    /**
     * Add commentaires
     *
     * @param \Oreha\ErpBundle\Entity\Commentaire $commentaires
     * @return Dossier
     */
    public function addCommentaire(\Oreha\ErpBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires[] = $commentaires;
    
        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \Oreha\ErpBundle\Entity\Commentaire $commentaires
     */
    public function removeCommentaire(\Oreha\ErpBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires->removeElement($commentaires);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Add statuts
     *
     * @param \Oreha\ErpBundle\Entity\Statut $statuts
     * @return Dossier
     */
    public function addStatut(\Oreha\ErpBundle\Entity\Statut $statuts)
    {
        $this->statuts[] = $statuts;
    
        return $this;
    }

    /**
     * Remove statuts
     *
     * @param \Oreha\ErpBundle\Entity\Statut $statuts
     */
    public function removeStatut(\Oreha\ErpBundle\Entity\Statut $statuts)
    {
        $this->statuts->removeElement($statuts);
    }

    /**
     * Get statuts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatuts()
    {
        return $this->statuts;
    }

    /**
     * Add echeances
     *
     * @param \Oreha\ErpBundle\Entity\Echeance $echeances
     * @return Dossier
     */
    public function addEcheance(\Oreha\ErpBundle\Entity\Echeance $echeances)
    {
        $this->echeances[] = $echeances;
    
        return $this;
    }

    /**
     * Remove echeances
     *
     * @param \Oreha\ErpBundle\Entity\Echeance $echeances
     */
    public function removeEcheance(\Oreha\ErpBundle\Entity\Echeance $echeances)
    {
        $this->echeances->removeElement($echeances);
    }

    /**
     * Get echeances
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEcheances()
    {
        return $this->echeances;
    }

    /**
     * Add rendezvouss
     *
     * @param \Oreha\ErpBundle\Entity\Rendezvous $rendezvouss
     * @return Dossier
     */
    public function addRendezvouss(\Oreha\ErpBundle\Entity\Rendezvous $rendezvouss)
    {
        $this->rendezvouss[] = $rendezvouss;
    
        return $this;
    }

    /**
     * Remove rendezvouss
     *
     * @param \Oreha\ErpBundle\Entity\Rendezvous $rendezvouss
     */
    public function removeRendezvouss(\Oreha\ErpBundle\Entity\Rendezvous $rendezvouss)
    {
        $this->rendezvouss->removeElement($rendezvouss);
    }

    /**
     * Get rendezvouss
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRendezvouss()
    {
        return $this->rendezvouss;
    }

    /**
     * Set source
     *
     * @param \Oreha\ErpBundle\Entity\Source $source
     * @return Dossier
     */
    public function setSource(\Oreha\ErpBundle\Entity\Source $source = null)
    {
        $this->source = $source;
    
        return $this;
    }

    /**
     * Get source
     *
     * @return \Oreha\ErpBundle\Entity\Source 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Add prets
     *
     * @param \Oreha\ErpBundle\Entity\Pret $prets
     * @return Dossier
     */
    public function addPret(\Oreha\ErpBundle\Entity\Pret $prets)
    {
        $this->prets[] = $prets;
    
        return $this;
    }

    /**
     * Remove prets
     *
     * @param \Oreha\ErpBundle\Entity\Pret $prets
     */
    public function removePret(\Oreha\ErpBundle\Entity\Pret $prets)
    {
        $this->prets->removeElement($prets);
    }

    /**
     * Get prets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrets()
    {
        return $this->prets;
    }

    /**
     * Add deviss
     *
     * @param \Oreha\ErpBundle\Entity\Devis $deviss
     * @return Dossier
     */
    public function addDeviss(\Oreha\ErpBundle\Entity\Devis $deviss)
    {
        $this->deviss[] = $deviss;
    
        return $this;
    }

    /**
     * Remove deviss
     *
     * @param \Oreha\ErpBundle\Entity\Devis $deviss
     */
    public function removeDeviss(\Oreha\ErpBundle\Entity\Devis $deviss)
    {
        $this->deviss->removeElement($deviss);
    }

    /**
     * Get deviss
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeviss()
    {
        return $this->deviss;
    }

    /**
     * Add users
     *
     * @param \Oreha\UserBundle\Entity\User $users
     * @return Dossier
     */
    public function addUser(\Oreha\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Oreha\UserBundle\Entity\User $users
     */
    public function removeUser(\Oreha\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add prestations
     *
     * @param \Oreha\ErpBundle\Entity\Prestation $prestations
     * @return Dossier
     */
    public function addPrestation(\Oreha\ErpBundle\Entity\Prestation $prestations)
    {
        $this->prestations[] = $prestations;
    
        return $this;
    }

    /**
     * Remove prestations
     *
     * @param \Oreha\ErpBundle\Entity\Prestation $prestations
     */
    public function removePrestation(\Oreha\ErpBundle\Entity\Prestation $prestations)
    {
        $this->prestations->removeElement($prestations);
    }

    /**
     * Get prestations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrestations()
    {
        return $this->prestations;
    }

    /**
     * Add declarations
     *
     * @param \Oreha\ErpBundle\Entity\DeclarationAdministrative $declarations
     * @return Dossier
     */
    public function addDeclaration(\Oreha\ErpBundle\Entity\DeclarationAdministrative $declarations)
    {
        $this->declarations[] = $declarations;
    
        return $this;
    }

    /**
     * Remove declarations
     *
     * @param \Oreha\ErpBundle\Entity\DeclarationAdministrative $declarations
     */
    public function removeDeclaration(\Oreha\ErpBundle\Entity\DeclarationAdministrative $declarations)
    {
        $this->declarations->removeElement($declarations);
    }

    /**
     * Get declarations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeclarations()
    {
        return $this->declarations;
    }

    /**
     * Add factures
     *
     * @param \Oreha\ErpBundle\Entity\Facture $factures
     * @return Dossier
     */
    public function addFacture(\Oreha\ErpBundle\Entity\Facture $factures)
    {
        $this->factures[] = $factures;
    
        return $this;
    }

    /**
     * Remove factures
     *
     * @param \Oreha\ErpBundle\Entity\Facture $factures
     */
    public function removeFacture(\Oreha\ErpBundle\Entity\Facture $factures)
    {
        $this->factures->removeElement($factures);
    }

    /**
     * Get factures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFactures()
    {
        return $this->factures;
    }

    /**
     * Add payements
     *
     * @param \Oreha\ErpBundle\Entity\Payement $payements
     * @return Dossier
     */
    public function addPayement(\Oreha\ErpBundle\Entity\Payement $payements)
    {
        $this->payements[] = $payements;
    
        return $this;
    }

    /**
     * Remove payements
     *
     * @param \Oreha\ErpBundle\Entity\Payement $payements
     */
    public function removePayement(\Oreha\ErpBundle\Entity\Payement $payements)
    {
        $this->payements->removeElement($payements);
    }

    /**
     * Get payements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPayements()
    {
        return $this->payements;
    }
}
