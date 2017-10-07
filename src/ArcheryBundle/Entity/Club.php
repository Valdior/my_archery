<?php

namespace ArcheryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="ArcheryBundle\Repository\ClubRepository")
 */
class Club
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="acronym", type="string", length=10, unique=true)
     */
    private $acronym;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", unique=true)
     */
    private $number;
    
    /**
     * @Gedmo\Slug(fields={"number", "acronym"})
     * @ORM\Column(name="slug", type="string", length=20, unique=true)
     */
    private $slug;
    
    /**
     * @ORM\OneToMany(targetEntity="ArcheryBundle\Entity\Affiliate", mappedBy="club")
     */
    private $membres;   

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
     * Set name
     *
     * @param string $name
     *
     * @return Club
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set acronym
     *
     * @param string $acronym
     *
     * @return Club
     */
    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;

        return $this;
    }

    /**
     * Get acronym
     *
     * @return string
     */
    public function getAcronym()
    {
        return $this->acronym;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Club
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Club
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->membres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add membre
     *
     * @param \ArcheryBundle\Entity\Affiliate $membre
     *
     * @return Club
     */
    public function addMembre(\ArcheryBundle\Entity\Affiliate $membre)
    {
        $this->membres[] = $membre;

        return $this;
    }

    /**
     * Remove membre
     *
     * @param \ArcheryBundle\Entity\Affiliate $membre
     */
    public function removeMembre(\ArcheryBundle\Entity\Affiliate $membre)
    {
        $this->membres->removeElement($membre);
    }

    /**
     * Get membres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembres()
    {
        return $this->membres;
    }
    
    public function getFullName()
    {
        return $this->number . ' - ' . $this->acronym . ' - ' . $this->name;
    }
}
