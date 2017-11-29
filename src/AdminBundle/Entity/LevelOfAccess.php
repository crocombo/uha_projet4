<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LevelOfAccess
 *
 * @ORM\Table(name="level_of_access")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\LevelOfAccessRepository")
 */
class LevelOfAccess
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="AccessLevel", type="integer")
     */
    private $accessLevel;


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
     * Set title
     *
     * @param string $title
     *
     * @return LevelOfAccess
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set accessLevel
     *
     * @param integer $accessLevel
     *
     * @return LevelOfAccess
     */
    public function setAccessLevel($accessLevel)
    {
        $this->accessLevel = $accessLevel;

        return $this;
    }

    /**
     * Get accessLevel
     *
     * @return int
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }
}

