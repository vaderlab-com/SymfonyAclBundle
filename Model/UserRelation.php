<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 4:47
 */

namespace VaderLab\AclBundle\Model;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class ResourceUserRelation
 * @package VaderLab\AclBundle\Model
 *
 * @ORM\InheritanceType()
 */
class UserRelation implements UserRelationInterface
{
    /**
     * @var int|null
     */
    protected $id;

    /**
     * @var ResourceInterface
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

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return UserRelation
     */
    public function setUserId(int $userId): UserRelationInterface
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Resource
     */
    public function getResource(): ResourceInterface
    {
        return $this->resource;
    }

    /**
     * @param Resource $resource
     * @return UserRelation
     */
    public function setResource(ResourceInterface $resource): UserRelationInterface
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * @return int
     */
    public function getAccessMask(): int
    {
        return $this->accessMask;
    }

    /**
     * @param int $mask
     * @return UserRelationInterface
     */
    public function setAccessMask(int $mask): UserRelationInterface
    {
        $this->accessMask = $mask;

        return $this;
    }
}