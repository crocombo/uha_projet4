<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeEvent
 *
 * @ORM\Table(name="type_event")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\TypeEventRepository")
 */
class TypeEvent
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




    //Relation Entity TypeEvent*********************************************************

    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\Event", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $event;









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
     * @return TypeEvent
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
     * @return TypeEvent
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
     * Set typeEvent
     *
     * @param \AdminBundle\Entity\TypeEvent $typeEvent
     *
     * @return TypeEvent
     */
    public function setTypeEvent(\AdminBundle\Entity\TypeEvent $typeEvent = null)
    {
        $this->typeEvent = $typeEvent;

        return $this;
    }


    /**
     * Get typeEvent
     *
     * @return \AdminBundle\Entity\TypeEvent
     */
    public function getTypeEvent()
    {
        return $this->typeEvent;
    }

    /**
     * Set event
     *
     * @param \AdminBundle\Entity\Event $event
     *
     * @return TypeEvent
     */
    public function setEvent(\AdminBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \AdminBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
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
