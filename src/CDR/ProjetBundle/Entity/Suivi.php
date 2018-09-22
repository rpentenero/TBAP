<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CDR\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Suivi
 *
 * @ORM\Table(name="suivi")
 * @ORM\Entity(repositoryClass="CDR\ProjetBundle\Repository\SuiviRepository")
 */
class Suivi {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var projet
     *
     * @ORM\ManyToOne(targetEntity="CDR\ProjetBundle\Entity\Projet", cascade={"persist"})
     */
    private $projet;
    
    /**
     * @var date
     *@ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * @var moyen
     *
     * @ORM\Column(name="moyen", type="string", length=255)
     */
    private $moyen;
    
    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(mimeTypes={ "application/pdf", "application/txt", "application/msg" })
     */
    private $fichier;


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
     *
     * @return Suivi
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \date_time
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set moyen
     *
     * @param string $moyen
     *
     * @return Suivi
     */
    public function setMoyen($moyen)
    {
        $this->moyen = $moyen;

        return $this;
    }

    /**
     * Get moyen
     *
     * @return string
     */
    public function getMoyen()
    {
        return $this->moyen;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Suivi
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set projet
     *
     * @param \CDR\UserBundle\Entity\Projet $projet
     *
     * @return Suivi
     */
    public function setProjet(\CDR\ProjetBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \CDR\UserBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set fichier
     *
     * @param string $fichier
     *
     * @return Suivi
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return string
     */
    public function getFichier()
    {
        return $this->fichier;
    }
}
