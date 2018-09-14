<?php

namespace CDR\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="CDR\ProjetBundle\Repository\ProjetRepository")
 */
class Projet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="num_ldr", type="string", length=255)
     */
    private $numLdr;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CDR\UserBundle\Entity\User", cascade={"persist"})
     */
    private $referent;
    
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CDR\UserBundle\Entity\User", cascade={"persist"})
     */
    private $agent1;
    
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CDR\UserBundle\Entity\User", cascade={"persist"})
     */
    private $agent2;
    
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CDR\UserBundle\Entity\User", cascade={"persist"})
     */
    private $agent3;
    
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CDR\UserBundle\Entity\User", cascade={"persist"})
     */
    private $agent4;
    
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CDR\UserBundle\Entity\User", cascade={"persist"})
     */
    private $agent5;
    
    /**
     * @var termine
     * @ORM\Column(name="termine", type="boolean", options={"default":false})
     */
    private $termine;
    
    /**
     * @var indic1_satisfactionClient
     * @ORM\Column(name="indic1_satisfactionClient", type="float", nullable=true)
     */
    private $indic1_satisfactionClient;
    
    /**
     * @var indic2_ratioCharges
     * @ORM\Column(name="indic2_ratioCharges", type="float", nullable=true)
     */
    private $indic2_ratioCharges;
    
    /**
     * @var indic3_tauxCouverture
     * @ORM\Column(name="indic3_tauxCouverture", type="float", nullable=true)
     */
    private $indic3_tauxCouverture;
    
    /**
     * @var indic4_tauxFSDeclassees
     * @ORM\Column(name="indic4_tauxFSDeclassees", type="float", nullable=true)
     */
    private $indic4_tauxFSDeclassees;
    
    /**
     * @var indic5_nombreTests
     * @ORM\Column(name="indic5_nombreTests", type="integer", nullable=true)
     */
    private $indic5_nombreTests;
    
    
    /**
     * @var indic6_nombreRelivraisons
     * @ORM\Column(name="indic6_nombreRelivraisons", type="integer", nullable=true)
     */
    private $indic6_nombreRelivraisons;
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Projet
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
    
     public function getPrenomNom()
    {
        return $this->prenom + $this->nom;
    }

    /**
     * Set numLdr
     *
     * @param string $numLdr
     *
     * @return Projet
     */
    public function setNumLdr($numLdr)
    {
        $this->numLdr = $numLdr;

        return $this;
    }

    /**
     * Get numLdr
     *
     * @return string
     */
    public function getNumLdr()
    {
        return $this->numLdr;
    }

    /**
     * Set referent
     *
     * @param string $referent
     *
     * @return Projet
     */
    public function setReferent($referent)
    {
        $this->referent = $referent;

        return $this;
    }

    /**
     * Get referent
     *
     * @return string
     */
    public function getReferent()
    {
        return $this->referent;
    }
    
    /**
     * Set agent1
     *
     * @param string $agent1
     *
     * @return Projet
     */
    public function setAgent1($agent1)
    {
        $this->agent1 = $agent1;

        return $this;
    }

    /**
     * Get agent1     
     *
     * @return string
     */
    public function getAgent1()
    {
        return $this->agent1;
    }
    
   /**
     * Set agent2
     *
     * @param string $agent2
     *
     * @return Projet
     */
    public function setAgent2($agent2)
    {
        $this->agent2 = $agent2;

        return $this;
    }

    /**
     * Get agent2     
     *
     * @return string
     */
    public function getAgent2()
    {
        return $this->agent2;
    }
    
    /**
     * Set agent1
     *
     * @param string $agent1
     *
     * @return Projet
     */
    public function setAgent3($agent3)
    {
        $this->agent3 = $agent3;

        return $this;
    }

    /**
     * Get agent3     
     *
     * @return string
     */
    public function getAgent3()
    {
        return $this->agent3;
    }
    
    /**
     * Set agent4
     *
     * @param string $agent4
     *
     * @return Projet
     */
    public function setAgent4($agent4)
    {
        $this->agent4 = $agent4;

        return $this;
    }

    /**
     * Get agent4    
     *
     * @return string
     */
    public function getAgent4()
    {
        return $this->agent4;
    }
    
    /**
     * Set agent5
     *
     * @param string $agent5
     *
     * @return Projet
     */
    public function setAgent5($agent5)
    {
        $this->agent5 = $agent5;

        return $this;
    }

    /**
     * Get agent5     
     *
     * @return string
     */
    public function getAgent5()
    {
        return $this->agent5;
    }
    
    /**
     * Set termine
     *
     * @param boolean $termine
     *
     * @return Projet
     */
    public function setTermine($termine)
    {
        $this->termine = $termine;

        return $this;
    }

    /**
     * Get termine
     *
     * @return boolean
     */
    public function getTermine()
    {
        return $this->termine;
    }

    /**
     * Set indic1SatisfactionClient
     *
     * @param float $indic1SatisfactionClient
     *
     * @return Projet
     */
    public function setIndic1SatisfactionClient($indic1SatisfactionClient)
    {
        $this->indic1_satisfactionClient = $indic1SatisfactionClient;

        return $this;
    }

    /**
     * Get indic1SatisfactionClient
     *
     * @return float
     */
    public function getIndic1SatisfactionClient()
    {
        return $this->indic1_satisfactionClient;
    }

    /**
     * Set indic2RatioCharges
     *
     * @param float $indic2RatioCharges
     *
     * @return Projet
     */
    public function setIndic2RatioCharges($indic2RatioCharges)
    {
        $this->indic2_ratioCharges = $indic2RatioCharges;

        return $this;
    }

    /**
     * Get indic2RatioCharges
     *
     * @return float
     */
    public function getIndic2RatioCharges()
    {
        return $this->indic2_ratioCharges;
    }

    /**
     * Set indic3TauxCouverture
     *
     * @param float $indic3TauxCouverture
     *
     * @return Projet
     */
    public function setIndic3TauxCouverture($indic3TauxCouverture)
    {
        $this->indic3_tauxCouverture = $indic3TauxCouverture;

        return $this;
    }

    /**
     * Get indic3TauxCouverture
     *
     * @return float
     */
    public function getIndic3TauxCouverture()
    {
        return $this->indic3_tauxCouverture;
    }

    /**
     * Set indic4TauxFSDeclassees
     *
     * @param float $indic4TauxFSDeclassees
     *
     * @return Projet
     */
    public function setIndic4TauxFSDeclassees($indic4TauxFSDeclassees)
    {
        $this->indic4_tauxFSDeclassees = $indic4TauxFSDeclassees;

        return $this;
    }

    /**
     * Get indic4TauxFSDeclassees
     *
     * @return float
     */
    public function getIndic4TauxFSDeclassees()
    {
        return $this->indic4_tauxFSDeclassees;
    }

    /**
     * Set indic5NombreTests
     *
     * @param integer $indic5NombreTests
     *
     * @return Projet
     */
    public function setIndic5NombreTests($indic5NombreTests)
    {
        $this->indic5_nombreTests = $indic5NombreTests;

        return $this;
    }

    /**
     * Get indic5NombreTests
     *
     * @return integer
     */
    public function getIndic5NombreTests()
    {
        return $this->indic5_nombreTests;
    }

    /**
     * Set indic6NombreRelivraisons
     *
     * @param integer $indic6NombreRelivraisons
     *
     * @return Projet
     */
    public function setIndic6NombreRelivraisons($indic6NombreRelivraisons)
    {
        $this->indic6_nombreRelivraisons = $indic6NombreRelivraisons;

        return $this;
    }

    /**
     * Get indic6NombreRelivraisons
     *
     * @return integer
     */
    public function getIndic6NombreRelivraisons()
    {
        return $this->indic6_nombreRelivraisons;
    }
}
