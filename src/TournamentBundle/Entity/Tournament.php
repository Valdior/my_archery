<?php

namespace TournamentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournament
 *
 * @ORM\Table(name="tournament")
 * @ORM\Entity(repositoryClass="TournamentBundle\Repository\TournamentRepository")
 */
class Tournament
{
    const TYPE_INDOOR = 'indoor';
    const TYPE_OUTDOOR = 'outdoor';
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="date")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="date")
     */
    private $dateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('indoor', 'outdoor')")
     */
    private $type;
    
    /**
     * @ORM\OneToMany(targetEntity="TournamentBundle\Entity\Peloton", mappedBy="tournament")
     */
    private $pelotons; 

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pelotons     = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateStart    = new \Datetime();
        $this->dateEnd      = new \Datetime();
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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Tournament
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return Tournament
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Tournament
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
     * Add peloton
     *
     * @param \TournamentBundle\Entity\Peloton $peloton
     *
     * @return Tournament
     */
    public function addPeloton(\TournamentBundle\Entity\Peloton $peloton)
    {
        $this->pelotons[] = $peloton;

        return $this;
    }

    /**
     * Remove peloton
     *
     * @param \TournamentBundle\Entity\Peloton $peloton
     */
    public function removePeloton(\TournamentBundle\Entity\Peloton $peloton)
    {
        $this->pelotons->removeElement($peloton);
    }

    /**
     * Get pelotons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPelotons()
    {
        return $this->pelotons;
    }
}
