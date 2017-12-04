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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectUserRole = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add article
     *
     * @param \AdminBundle\Entity\Article $article
     *
     * @return Project
     */
    public function addArticle(\AdminBundle\Entity\Article $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \AdminBundle\Entity\Article $article
     */
    public function removeArticle(\AdminBundle\Entity\Article $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set problematic
     *
     * @param \AdminBundle\Entity\Problematic $problematic
     *
     * @return Project
     */
    public function setProblematic(\AdminBundle\Entity\Problematic $problematic)
    {
        $this->problematic = $problematic;

        return $this;
    }

    /**
     * Get problematic
     *
     * @return \AdminBundle\Entity\Problematic
     */
    public function getProblematic()
    {
        return $this->problematic;
    }

    /**
     * Add projectUserRole
     *
     * @param \AdminBundle\Entity\ProjectUserRole $projectUserRole
     *
     * @return Project
     */
    public function addProjectUserRole(\AdminBundle\Entity\ProjectUserRole $projectUserRole)
    {
        $this->projectUserRole[] = $projectUserRole;

        return $this;
    }

    /**
     * Remove projectUserRole
     *
     * @param \AdminBundle\Entity\ProjectUserRole $projectUserRole
     */
    public function removeProjectUserRole(\AdminBundle\Entity\ProjectUserRole $projectUserRole)
    {
        $this->projectUserRole->removeElement($projectUserRole);
    }

    /**
     * Get projectUserRole
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjectUserRole()
    {
        return $this->projectUserRole;
    }


    // Function permetant de representeter un objet designé par une chaine de caractere (string) ex pour liste deroulante...
    public function __toString()
    {
        return $this->getName();
    }
    // Exemple avec Id:
    //public function __toString()
    //{
    //    return (string) $this->getId();
    //}
}
