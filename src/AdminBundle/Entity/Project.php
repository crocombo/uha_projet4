<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProjectRepository")
 */
class Project
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
     * @ORM\Column(name="name", type="string", length=100, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;





    //Relation Entity Project*********************************************************

    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\Article", cascade={"persist"}, mappedBy="projet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;


    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Problematic", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $problematic;


    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\ProjectUserRole", cascade={"persist"}, mappedBy="projet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projectUserRole;







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
     * @return Project
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
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

