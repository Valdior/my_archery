<?php

namespace TournamentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity(repositoryClass="TournamentBundle\Repository\ParticipantRepository")
 */
class Participant
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
     * @var int
     *
     * @ORM\Column(name="point", type="integer")
     */
    private $point;

    /**
     * @var int
     *
     * @ORM\Column(name="x", type="integer", nullable=true)
     */
    private $x;

    /**
     * @var int
     *
     * @ORM\Column(name="ten", type="integer")
     */
    private $ten;

    /**
     * @var int
     *
     * @ORM\Column(name="nine", type="integer", nullable=true)
     */
    private $nine;
    
    /**
     * @var int
     *
     * @ORM\Column(name="isForfait", type="boolean")
     */
    private $isForfait;
    
    /**
     * @ORM\ManyToOne(targetEntity="ArcheryBundle\Entity\Archer", inversedBy="participations")
     */
    private $archer;
    
    /**
     * @ORM\ManyToOne(targetEntity="TournamentBundle\Entity\Peloton", inversedBy="participants")
     */
    private $pelotons;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isForfait = false;
        $this->point = 0;
        $this->ten = 0;
    }

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
     * Set point
     *
     * @param integer $point
     *
     * @return Participant
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return integer
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set x
     *
     * @param integer $x
     *
     * @return Participant
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set ten
     *
     * @param integer $ten
     *
     * @return Participant
     */
    public function setTen($ten)
    {
        $this->ten = $ten;

        return $this;
    }

    /**
     * Get ten
     *
     * @return integer
     */
    public function getTen()
    {
        return $this->ten;
    }

    /**
     * Set nine
     *
     * @param integer $nine
     *
     * @return Participant
     */
    public function setNine($nine)
    {
        $this->nine = $nine;

        return $this;
    }

    /**
     * Get nine
     *
     * @return integer
     */
    public function getNine()
    {
        return $this->nine;
    }

    /**
     * Set isForfait
     *
     * @param boolean $isForfait
     *
     * @return Participant
     */
    public function setIsForfait($isForfait)
    {
        $this->isForfait = $isForfait;

        return $this;
    }

    /**
     * Get isForfait
     *
     * @return boolean
     */
    public function getIsForfait()
    {
        return $this->isForfait;
    }

    /**
     * Set archers
     *
     * @param \ArcheryBundle\Entity\Archer $archers
     *
     * @return Participant
     */
    public function setArcher(\ArcheryBundle\Entity\Archer $archer = null)
    {
        $this->archer = $archer;

        return $this;
    }

    /**
     * Get archers
     *
     * @return \ArcheryBundle\Entity\Archer
     */
    public function getArcher()
    {
        return $this->archer;
    }

    /**
     * Set pelotons
     *
     * @param \TournamentBundle\Entity\Peloton $pelotons
     *
     * @return Participant
     */
    public function setPelotons(\TournamentBundle\Entity\Peloton $pelotons = null)
    {
        $this->pelotons = $pelotons;

        return $this;
    }

    /**
     * Get pelotons
     *
     * @return \TournamentBundle\Entity\Peloton
     */
    public function getPelotons()
    {
        return $this->pelotons;
    }
}
