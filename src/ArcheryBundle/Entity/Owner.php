<?php

namespace ArcheryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Owner
 *
 * @ORM\Table(name="owner")
 * @ORM\Entity(repositoryClass="ArcheryBundle\Repository\OwnerRepository")
 */
class Owner
{
    const PENDING = 'Pending';
    const ACCEPT = 'Accept';
    const REFUSE = 'Refuse';
    const REVOK = 'Revok';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="owners")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="ArcheryBundle\Entity\Archer", inversedBy="owners")
     * @ORM\JoinColumn(nullable=false)
     */
    private $archer;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     */
    private $isAccepted;

    public static function getIsAcceptedList()
    {
        return [self::PENDING, self::ACCEPT, self::REFUSE, self::REVOK];
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
     * Set isAccepted
     *
     * @param string $isAccepted
     *
     * @return Owner
     */
    public function setIsAccepted($isAccepted)
    {
        if (!in_array($isAccepted, self::getIsAcceptedList())) {
            throw new \InvalidArgumentException("Invalid type");
        }

        $this->isAccepted = array_search($isAccepted, self::getIsAcceptedList());

        return $this;
    }

    /**
     * Get isAccepted
     *
     * @return string
     */
    public function getIsAccepted()
    {
        return self::getIsAcceptedList()[$this->isAccepted]; 
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Owner
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set archer
     *
     * @param \ArcheryBundle\Entity\Archer $archer
     *
     * @return Owner
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
