<?php

namespace ArcheryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliate
 *
 * @ORM\Table(name="affiliate")
 * @ORM\Entity(repositoryClass="ArcheryBundle\Repository\AffiliateRepository")
 */
class Affiliate
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
     * @ORM\Column(name="registrationNumber", type="string")
     */
    private $registrationNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="affiliatedSince", type="date")
     */
    private $affiliatedSince;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="affiliatedEnd", type="date", nullable=true)
     */
    private $affiliatedEnd;
    
    /**
     * @ORM\ManyToOne(targetEntity="ArcheryBundle\Entity\Club", inversedBy="membres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $club;
    
    /**
     * @ORM\ManyToOne(targetEntity="ArcheryBundle\Entity\Archer", inversedBy="affiliates", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $archer;

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
     * Set registrationNumber
     *
     * @param string $registrationNumber
     *
     * @return Affiliate
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    /**
     * Get registrationNumber
     *
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     * Set affiliatedSince
     *
     * @param \DateTime $affiliatedSince
     *
     * @return Affiliate
     */
    public function setAffiliatedSince($affiliatedSince)
    {
        $this->affiliatedSince = $affiliatedSince;

        return $this;
    }

    /**
     * Get affiliatedSince
     *
     * @return \DateTime
     */
    public function getAffiliatedSince()
    {
        return $this->affiliatedSince;
    }

    /**
     * Set affiliatedEnd
     *
     * @param \DateTime $affiliatedEnd
     *
     * @return Affiliate
     */
    public function setAffiliatedEnd($affiliatedEnd)
    {
        $this->affiliatedEnd = $affiliatedEnd;

        return $this;
    }

    /**
     * Get affiliatedEnd
     *
     * @return \DateTime
     */
    public function getAffiliatedEnd()
    {
        return $this->affiliatedEnd;
    }

    /**
     * Set club
     *
     * @param \ArcheryBundle\Entity\Club $club
     *
     * @return Affiliate
     */
    public function setClub(\ArcheryBundle\Entity\Club $club)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \ArcheryBundle\Entity\Club
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Set archer
     *
     * @param \ArcheryBundle\Entity\Archer $archer
     *
     * @return Affiliate
     */
    public function setArcher(\ArcheryBundle\Entity\Archer $archer)
    {
        $this->archer = $archer;

        return $this;
    }

    /**
     * Get archer
     *
     * @return \ArcheryBundle\Entity\Archer
     */
    public function getArcher()
    {
        return $this->archer;
    }
}
