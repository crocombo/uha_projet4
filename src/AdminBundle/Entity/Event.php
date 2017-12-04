<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\EventRepository")
 */
class Event
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





    //Relation Entity Event*********************************************************

    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\TypeEvent", cascade={"persist"})
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
     * @return Event
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
     * @return Event
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
     * Set event
     *
     * @param \AdminBundle\Entity\Event $event
     *
     * @return Event
     */
    public function setEvent(\AdminBundle\Entity\Event $event)
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




    /**
     * Set typeEvent
     *
     * @param \AdminBundle\Entity\Event $typeEvent
     *
     * @return Event
     */
    public function setTypeEvent(\AdminBundle\Entity\Event $typeEvent = null)
    {
        $this->typeEvent = $typeEvent;

        return $this;
    }

    /**
     * Get typeEvent
     *
     * @return \AdminBundle\Entity\Event
     */
    public function getTypeEvent()
    {
        return $this->typeEvent;
    }





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->typeEvent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add typeEvent
     *
     * @param \AdminBundle\Entity\TypeEvent $typeEvent
     *
     * @return Event
     */
    public function addTypeEvent(\AdminBundle\Entity\TypeEvent $typeEvent)
    {
        $this->typeEvent[] = $typeEvent;

        return $this;
    }

    /**
     * Remove typeEvent
     *
     * @param \AdminBundle\Entity\TypeEvent $typeEvent
     */
    public function removeTypeEvent(\AdminBundle\Entity\TypeEvent $typeEvent)
    {
        $this->typeEvent->removeElement($typeEvent);
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
