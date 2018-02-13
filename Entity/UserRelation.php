<?php
declare(strict_types=1);

namespace VaderLab\AclBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use VaderLab\AclBundle\Model\ResourceInterface;
use VaderLab\AclBundle\Model\UserRelation as BaseUserRelation;

/**
 * UserRelation
 *
 * @ORM\Table(name="user_relation")
 * @ORM\Entity(repositoryClass="VaderLab\AclBundle\Repository\UserRelationRepository")
 */
class UserRelation extends BaseUserRelation
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
     * @var ResourceInterface
     * @ORM\ManyToOne(
     *     targetEntity="VaderLab\AclBundle\Entity\Resource",
     *     inversedBy="resourceUsersRelations",
     *     fetch="EAGER",
     *     cascade={"ALL"}
     *     )
     */
    protected $resource;

    /**
     * @var int
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    protected $userId;

    /**
     * @var int
     * @ORM\Column(name="access_mask", type="integer", nullable=false)
     */
    protected $accessMask;
}
