<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ArticleRepository")
 */
class Article
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





    //Relation Entity Article*********************************************************

    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Category", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;


    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\Document", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $document;


    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\Video", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $video;


    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;


    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Project", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;




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
     * @return Article
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
     * @return Article
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
     * Set category
     *
     * @param \AdminBundle\Entity\Category $category
     *
     * @return Article
     */
    public function setCategory(\AdminBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AdminBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set document
     *
     * @param \AdminBundle\Entity\Document $document
     *
     * @return Article
     */
    public function setDocument(\AdminBundle\Entity\Document $document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \AdminBundle\Entity\Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set video
     *
     * @param \AdminBundle\Entity\Video $video
     *
     * @return Article
     */
    public function setVideo(\AdminBundle\Entity\Video $video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \AdminBundle\Entity\Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set image
     *
     * @param \AdminBundle\Entity\Image $image
     *
     * @return Article
     */
    public function setImage(\AdminBundle\Entity\Image $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AdminBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set project
     *
     * @param \AdminBundle\Entity\Project $project
     *
     * @return Article
     */
    public function setProject(\AdminBundle\Entity\Project $project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AdminBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
