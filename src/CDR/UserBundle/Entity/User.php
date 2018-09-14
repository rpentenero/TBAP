<?php

namespace CDR\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Table(name="cdr_user")
 * @ORM\Entity(repositoryClass="CDR\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;


    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
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
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
    
    public function getPrenomEtNom(){
        return $this->prenom.' '.$this->nom;    
        
    }
}

/**
 * a:1:{i:0;s:10:"ROLE_ADMIN";}
 * a:1:{i:0;s:13:"ROLE_REFERENT";}
 * a:0:{}
 */