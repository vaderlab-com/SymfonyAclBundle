<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 6:09
 */

namespace VaderLab\AclBundle\Model;


interface EntityRelationInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param mixed $resource
     * @return EntityRelationInterface
     */
    public function setResource($resource): EntityRelationInterface;

    /**
     * @return int
     */
    public function getEntityId(): ?int;

    /**
     * @param mixed $entityId
     *
     * @return EntityRelationInterface
     */
    public function setEntityId(int $entityId): EntityRelationInterface;

    /**
     * @return mixed
     */
    public function getDomain() : string;

    /**
     * @param string $domain
     * @return EntityRelationInterface
     */
    public function setDomain(string $domain): EntityRelationInterface;

    /**
     * @return string|null
     */
    public function getEntityType(): ?string;

    /**
     * @param string $entityType
     *
     * @return EntityRelationInterface
     */
    public function setEntityType(string $entityType): EntityRelationInterface;
}