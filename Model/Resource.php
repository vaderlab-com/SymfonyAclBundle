<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 4:21
 */

namespace VaderLab\AclBundle\Model;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Resource
 * @package VaderLab\AclBundle\Model
 *
 *
 * @ORM\InheritanceType()
 */
class Resource implements ResourceInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var EntityRelation[]
     */
    protected $entitiesRelations;

    /**
     * @var UserRelation[]
     */
    protected $resourceUsersRelations;

    /**
     * @var string
     */
    protected  $name;

    /**
     * @var integer
     */
    protected $creatorId;

    /**
     * Resource constructor.
     */
    public function __construct()
    {
        $this->entitiesRelations        = new ArrayCollection();
        $this->resourceUsersRelations   = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): ResourceInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatorId(): ?int
    {
        return $this->creatorId;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatorId(int $creatorId): ResourceInterface
    {
        $this->creatorId = $creatorId;

        return $this;
    }

    /**
     * @return UserRelation[]
     */
    public function getResourceUsersRelations(): Collection
    {
        return $this->resourceUsersRelations;
    }

    /**
     * {@inheritdoc}
     */
    public function setResourceUsersRelations(Collection $resourceUsersRelations): ResourceInterface
    {
        $this->resourceUsersRelations = $resourceUsersRelations;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntitiesRelations(): Collection
    {
        return $this->entitiesRelations;
    }

    /**
     * {@inheritdoc}
     */
    public function setEntitiesRelations(Collection $entitiesRelations): ResourceInterface
    {
        $this->entitiesRelations = $entitiesRelations;

        return $this;
    }
}