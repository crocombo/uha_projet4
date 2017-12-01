<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectUserRole
 *
 * @ORM\Table(name="project_user_role")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProjectUserRoleRepository")
 */
class ProjectUserRole
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
     * @ORM\Column(name="ProjectId", type="string", length=100, unique=true)
     */
    private $projectId;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=100, unique=true)
     */
    private $userId;





    //Relation Entity ProjectUserRole*********************************************************

    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Project", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;


    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\LevelOfAccess", cascade={"persist"}, mappedBy="levelOfAccess")
     * @ORM\JoinColumn(nullable=false)
     */
    private $levelOfAccess;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;






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
     * Set projectId
     *
     * @param string $projectId
     *
     * @return ProjectUserRole
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return string
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set userId
     *
     * @param string $userId
     *
     * @return ProjectUserRole
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }
}

