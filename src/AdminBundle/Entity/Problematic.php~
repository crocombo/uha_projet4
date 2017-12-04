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
}

