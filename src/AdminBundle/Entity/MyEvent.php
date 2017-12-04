<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MyEvent
 *
 * @ORM\Table(name="my_event")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\MyEventRepository")
 */
class MyEvent
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="typeOfTheEvent", type="string", length=100)
     */
    private $typeOfTheEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * @return MyEvent
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
     * Set typeOfTheEvent
     *
     * @param string $typeOfTheEvent
     *
     * @return MyEvent
     */
    public function setTypeOfTheEvent($typeOfTheEvent)
    {
        $this->typeOfTheEvent = $typeOfTheEvent;

        return $this;
    }

    /**
     * Get typeOfTheEvent
     *
     * @return string
     */
    public function getTypeOfTheEvent()
    {
        return $this->typeOfTheEvent;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return MyEvent
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

