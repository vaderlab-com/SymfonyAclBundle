<?php
declare(strict_types=1);

namespace VaderLab\AclBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use VaderLab\AclBundle\Model\Resource as BaseResource;
use VaderLab\AclBundle\Model\EntityRelationInterface;
use VaderLab\AclBundle\Model\UserRelationInterface;

/**
 * Resource
 *
 * @ORM\Table(name="resource")
 * @ORM\Entity(repositoryClass="VaderLab\AclBundle\Repository\ResourceRepository")
 */
class Resource extends BaseResource
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var EntityRelationInterface[]
     * @ORM\OneToMany(
     *     targetEntity="VaderLab\AclBundle\Entity\EntityRelation",
     *     mappedBy="resource",
     *     fetch="LAZY",
     *     cascade={"persist"}
     *     )
     */
    protected $entitiesRelations;

    /**
     * @var UserRelationInterface[]
     * @ORM\OneToMany(
     *     targetEntity="VaderLab\AclBundle\Entity\EntityRelation",
     *     mappedBy="resource",
     *     fetch="LAZY",
     *     cascade={"persist"}
     *     )
     */
    protected $resourceUsersRelations;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    protected  $name;

    /**
     * @var integer
     * @ORM\Column(name="creator_id", type="integer", nullable=false)
     */
    protected $creatorId;
}
