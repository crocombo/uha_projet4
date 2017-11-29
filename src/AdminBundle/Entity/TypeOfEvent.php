<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeOfEvent
 *
 * @ORM\Table(name="type_of_event")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\TypeOfEventRepository")
 */
class TypeOfEvent
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
     * @var bool
     *
     * @ORM\Column(name="isPublic", type="boolean")
     */
    private $isPublic;

    /**
     * @var bool
     *
     * @ORM\Column(name="isFree", type="boolean")
     */
    private $isFree;


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
     * Set isPublic
     *
     * @param boolean $isPublic
     *
     * @return TypeOfEvent
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * Get isPublic
     *
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * Set isFree
     *
     * @param boolean $isFree
     *
     * @return TypeOfEvent
     */
    public function setIsFree($isFree)
    {
        $this->isFree = $isFree;

        return $this;
    }

    /**
     * Get isFree
     *
     * @return bool
     */
    public function getIsFree()
    {
        return $this->isFree;
    }
}

