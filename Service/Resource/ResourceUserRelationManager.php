<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 5:30
 */

namespace VaderLab\AclBundle\Service\Resource;


use VaderLab\AclBundle\Model\ResourceInterface;
use VaderLab\AclBundle\Model\UserRelationInterface;
use VaderLab\AclBundle\Service\Access\AccessMaskBuilderInterface;

class ResourceUserRelationManager
{
    /**
     * @var string
     */
    private $resourceUserRelationClass;

    /**
     * @var AccessMaskBuilderInterface
     */
    private $accessMaskBuilder;

    /**
     * ResourceUserRelationManager constructor.
     * @param string $resourceUserRelationClass
     */
    public function __construct(
        AccessMaskBuilderInterface $accessMaskBuilder,
        string $resourceUserRelationClass
    ) {
        $this->resourceUserRelationClass = $resourceUserRelationClass;
        $this->accessMaskBuilder = $accessMaskBuilder;
    }

    public function createRelation(ResourceInterface $resource)
    {
        /** @var UserRelationInterface $resourceUserRelation */
        $resourceUserRelation = new $this->resourceUserRelationClass;

        $resourceUserRelation->setResource($resource);
        $resourceUserRelation->setUserId($resource->getCreatorId());
        $resourceUserRelation->setAccessMask($this->createOwnerAccessMask());

        return $resourceUserRelation;
    }

    /**
     * @return int
     */
    public function createOwnerAccessMask()
    {
        return
            AccessMaskBuilderInterface::A_READ |
            AccessMaskBuilderInterface::A_CREATE |
            AccessMaskBuilderInterface::A_EDIT |
            AccessMaskBuilderInterface::A_DELETE;
    }
}