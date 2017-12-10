<?php

namespace TournamentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Type("integer")
     * @Assert\GreaterThanOrEqual("0")
     */
    private $point;

    /**
     * @var int
     *
     * @ORM\Column(name="x", type="integer", nullable=true)
     * @Assert\Type("integer")
     * @Assert\GreaterThanOrEqual("0")
     */
    private $x;

    /**
     * @var int
     *
     * @ORM\Column(name="ten", type="integer")
     * @Assert\Type("integer")
     * @Assert\GreaterThanOrEqual("0")
     */
    private $ten;

    /**
     * @var int
     *
     * @ORM\Column(name="nine", type="integer", nullable=true)
     * @Assert\Type("integer")
     * @Assert\GreaterThanOrEqual("0")
     */
    private $nine;
    
    /**
     * @var int
     *
     * @ORM\Column(name="isForfait", type="boolean")
     * @Assert\Type("bool")
     */
    private $isForfait;
    
    /**
     * @ORM\ManyToOne(targetEntity="ArcheryBundle\Entity\Archer", inversedBy="participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $participant;
    
    /**
     * @ORM\ManyToOne(targetEntity="TournamentBundle\Entity\Peloton", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $peloton;
    
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
     * Set participant
     *
     * @param \ArcheryBundle\Entity\Archer $participant
     *
     * @return Participant
     */
    public function setParticipant(\ArcheryBundle\Entity\Archer $participant)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return \ArcheryBundle\Entity\Archer
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set peloton
     *
     * @param \TournamentBundle\Entity\Peloton $peloton
     *
     * @return Participant
     */
    public function setPeloton(\TournamentBundle\Entity\Peloton $peloton)
    {
        $this->peloton = $peloton;

        return $this;
    }

    /**
     * Get peloton
     *
     * @return \TournamentBundle\Entity\Peloton
     */
    public function getPeloton()
    {
        return $this->peloton;
    }
}
