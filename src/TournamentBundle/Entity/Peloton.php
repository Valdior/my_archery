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
    const TYPE_50_30 = '50/30';
    const TYPE_2_70 = '2x70';
    const TYPE_2_50 = '2x50';
    const TYPE_2_25 = '2x25';
    const TYPE_18 = '18';
    
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
     * @ORM\Column(name="startTime", type="datetime")
     */
    private $startTime;
    
    /**
     * @ORM\ManyToOne(targetEntity="TournamentBundle\Entity\Tournament", inversedBy="pelotons", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tournament;
    
    /**
     * @ORM\OneToMany(targetEntity="TournamentBundle\Entity\Participant", mappedBy="peloton")
     */
    private $participants;

    public static function getTypeList()
    {
        return [self::TYPE_18, self::TYPE_2_25, self::TYPE_2_50, self::TYPE_2_70, self::TYPE_50_30];
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->startTime    = new \Datetime();
        $this->type = 0;
    }


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
        if (!in_array($type, self::getTypeList())) {
            throw new \InvalidArgumentException("Invalid type");
        }

        $this->type = array_search($type, self::getTypeList());

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {       
        return self::getTypeList()[$this->type];
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

    /**
     * Add participant
     *
     * @param \TournamentBundle\Entity\Participant $participant
     *
     * @return Peloton
     */
    public function addParticipant(\TournamentBundle\Entity\Participant $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove participant
     *
     * @param \TournamentBundle\Entity\Participant $participant
     */
    public function removeParticipant(\TournamentBundle\Entity\Participant $participant)
    {
        $this->participants->removeElement($participant);
    }

    /**
     * Get participants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }
}
