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
     * Set name
     *
     * @param string $name
     *
     * @return TypeOfEvent
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
     * @return TypeOfEvent
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
     * Set typeOfEvent
     *
     * @param \AdminBundle\Entity\TypeOfEvent $typeOfEvent
     *
     * @return TypeOfEvent
     */
    public function setTypeOfEvent(\AdminBundle\Entity\TypeOfEvent $typeOfEvent)
    {
        $this->typeOfEvent = $typeOfEvent;

        return $this;
    }

    /**
     * Get typeOfEvent
     *
     * @return \AdminBundle\Entity\TypeOfEvent
     */
    public function getTypeOfEvent()
    {
        return $this->typeOfEvent;
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
