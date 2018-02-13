<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 5:28
 */

namespace VaderLab\AclBundle\Model;


use Doctrine\Common\Collections\Collection;

interface ResourceInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;
    /**
     * @param string $name
     * @return ResourceInterface
     */
    public function setName(string $name): ResourceInterface;

    /**
     * @return int|null
     */
    public function getCreatorId(): ?int;

    /**
     * @param int $creatorId
     * @return ResourceInterface
     */
    public function setCreatorId(int $creatorId): ResourceInterface;

    /**
     * @return UserRelation[]
     */
    public function getResourceUsersRelations(): Collection;

    /**
     * @param UserRelation[] $resourceUsersRelations
     * @return ResourceInterface
     */
    public function setResourceUsersRelations(Collection $resourceUsersRelations): ResourceInterface;

    /**
     * @return EntityRelation[]
     */
    public function getEntitiesRelations(): Collection;

    /**
     * @param EntityRelation[] $entitiesRelations
     * @return ResourceInterface
     */
    public function setEntitiesRelations(Collection $entitiesRelations): ResourceInterface;
}