<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 4:37
 */

namespace VaderLab\AclBundle\Model;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class ResourceEntityRelation
 * @package VaderLab\AclBundle\Model
 *
 * @ORM\InheritanceType()
 */
class EntityRelation implements EntityRelationInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Resource
     */
    protected $resource;

    /**
     * @var int
     */
    private $entityId;

    /**
     * @var string
     */
    private $entityType;

    /**
     * @var string
     */
    private $domain = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $resource
     * @return EntityRelationInterface
     */
    public function setResource($resource): EntityRelationInterface
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntityId(): ?int
    {
        return $this->entityId;
    }

    /**
     * @param mixed $entityId
     *
     * @return EntityRelationInterface
     */
    public function setEntityId(int $entityId): EntityRelationInterface
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     * @return EntityRelationInterface
     */
    public function setDomain(string $domain): EntityRelationInterface
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEntityType(): ?string
    {
        return $this->entityType;
    }

    /**
     * @param string $entityType
     *
     * @return EntityRelationInterface
     */
    public function setEntityType(string $entityType): EntityRelationInterface
    {
        $this->entityType = $entityType;

        return $this;
    }
}