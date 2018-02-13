<?php
declare(strict_types=1);

namespace VaderLab\AclBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use VaderLab\AclBundle\Model\EntityRelation as BaseEntityRelation;
use VaderLab\AclBundle\Model\ResourceInterface;

/**
 * EntityRelation
 *
 * @ORM\Table(name="entity_relation")
 * @ORM\Entity(repositoryClass="VaderLab\AclBundle\Repository\EntityRelationRepository")
 */
class EntityRelation extends BaseEntityRelation
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
     * @ORM\ManyToOne(targetEntity="VaderLab\AclBundle\Entity\Resource", inversedBy="entitiesRelations", fetch="EAGER")
     */
    protected $resource;

    /**
     * @var int
     * @ORM\Column(name="entity_id", type="integer", nullable=false)
     */
    protected $entityId;

    /**
     * @var string
     * @ORM\Column(name="entity_type", type="string", length=64, nullable=false)
     */
    protected $entityType;

    /**
     * @var string
     * @ORM\Column(name="domain", type="string", length=64, nullable=false)
     */
    protected $domain = '';
}
