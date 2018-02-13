<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 5:31
 */

namespace VaderLab\AclBundle\Model;


interface UserRelationInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return int|null
     */
    public function getUserId(): ?int;

    /**
     * @param int $userId
     * @return UserRelationInterface
     */
    public function setUserId(int $userId): UserRelationInterface;

    /**
     * @return ResourceInterface
     */
    public function getResource(): ?ResourceInterface;

    /**
     * @param ResourceInterface $resource
     * @return UserRelationInterface
     */
    public function setResource(ResourceInterface $resource): UserRelationInterface;

    /**
     * @return int
     */
    public function getAccessMask(): int;

    /**
     * @param int $mask
     * @return UserRelationInterface
     */
    public function setAccessMask(int $mask): UserRelationInterface;
}