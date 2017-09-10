<?php

namespace TournamentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Peloton
 *
 * @ORM\Table(name="peloton")
 * @ORM\Entity(repositoryClass="TournamentBundle\Repository\PelotonRepository")
 */
class Peloton
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
     * @ORM\Column(name="maxParticipant", type="integer")
     */
    private $maxParticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('2x70', '2x50', '50/30', '2x25', '18')")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startTime", type="time")
     */
    private $startTime;
    
    /**
     * @ORM\ManyToOne(targetEntity="TournamentBundle\Entity\Tournament", inversedBy="pelotons", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tournament;


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
     * Set maxParticipant
     *
     * @param integer $maxParticipant
     *
     * @return Peloton
     */
    public function setMaxParticipant($maxParticipant)
    {
        $this->maxParticipant = $maxParticipant;

        return $this;
    }

    /**
     * Get maxParticipant
     *
     * @return int
     */
    public function getMaxParticipant()
    {
        return $this->maxParticipant;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Peloton
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return Peloton
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set tournament
     *
     * @param \TournamentBundle\Entity\Tournament $tournament
     *
     * @return Peloton
     */
    public function setTournament(\TournamentBundle\Entity\Tournament $tournament)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return \TournamentBundle\Entity\Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }
}
