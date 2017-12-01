<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;





    //Relation Entity User*********************************************************

    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\GroupMember", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $groupMember;


    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\ProjectUserRole", cascade={"persist"}, mappedBy="user")
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


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}

