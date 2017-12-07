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





    /**
     * Set groupMember
     *
     * @param \AdminBundle\Entity\GroupMember $groupMember
     *
     * @return User
     */
    public function setGroupMember(\AdminBundle\Entity\GroupMember $groupMember = null)
    {
        $this->groupMember = $groupMember;

        return $this;
    }

    /**
     * Get groupMember
     *
     * @return \AdminBundle\Entity\GroupMember
     */
    public function getGroupMember()
    {
        return $this->groupMember;
    }

    /**
     * Add projectUserRole
     *
     * @param \AdminBundle\Entity\ProjectUserRole $projectUserRole
     *
     * @return User
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


}
