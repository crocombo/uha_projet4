<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Problematic
 *
 * @ORM\Table(name="problematic")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProblematicRepository")
 */
class Problematic
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





    //Relation Entity Problematic*********************************************************

    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\Project", cascade={"persist"}, mappedBy="project")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;


    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\TypeOfProblematic", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeOfProblematic;







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
     * @return Problematic
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
     * @return Problematic
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
        $this->project = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add project
     *
     * @param \AdminBundle\Entity\Project $project
     *
     * @return Problematic
     */
    public function addProject(\AdminBundle\Entity\Project $project)
    {
        $this->project[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \AdminBundle\Entity\Project $project
     */
    public function removeProject(\AdminBundle\Entity\Project $project)
    {
        $this->project->removeElement($project);
    }

    /**
     * Get project
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set typeOfProblematic
     *
     * @param \AdminBundle\Entity\TypeOfProblematic $typeOfProblematic
     *
     * @return Problematic
     */
    public function setTypeOfProblematic(\AdminBundle\Entity\TypeOfProblematic $typeOfProblematic)
    {
        $this->typeOfProblematic = $typeOfProblematic;

        return $this;
    }

    /**
     * Get typeOfProblematic
     *
     * @return \AdminBundle\Entity\TypeOfProblematic
     */
    public function getTypeOfProblematic()
    {
        return $this->typeOfProblematic;
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
