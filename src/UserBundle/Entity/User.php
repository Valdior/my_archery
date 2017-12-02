<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 * 
 * @ExclusionPolicy("all") 
 */
class User extends BaseUser
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     */
    protected $firstname;

    /**
     * @ORM\OneToMany(targetEntity="ArcheryBundle\Entity\Owner", mappedBy="user")
     */
    private $owners;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Add owner
     *
     * @param \ArcheryBundle\Entity\Owner $owner
     *
     * @return User
     */
    public function addOwner(\ArcheryBundle\Entity\Owner $owner)
    {
        $this->owners[] = $owner;

        return $this;
    }

    /**
     * Remove owner
     *
     * @param \ArcheryBundle\Entity\Owner $owner
     */
    public function removeOwner(\ArcheryBundle\Entity\Owner $owner)
    {
        $this->owners->removeElement($owner);
    }

    /**
     * Get owners
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOwners()
    {
        return $this->owners;
    }
}
