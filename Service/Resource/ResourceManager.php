<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 5:21
 */

namespace VaderLab\AclBundle\Service\Resource;


use VaderLab\AclBundle\Model\Resource;
use VaderLab\AclBundle\Model\ResourceInterface;
use VaderLab\AclBundle\Model\UserInterface;

class ResourceManager implements ResourceManagerInterface
{
    /**
     * @var string
     */
    private $resourceClass;

    /**
     * @var ResourceUserRelationManager
     */
    private $userResourceRelationService;

    /**
     * ResourceManager constructor.
     * @param ResourceUserRelationManager $userResourceRelationService
     * @param string $resourceClass
     */
    public function __construct(
        ResourceUserRelationManager $userResourceRelationService,
        string $resourceClass
    ) {
        $this->userResourceRelationService = $userResourceRelationService;
        $this->resourceClass = $resourceClass;
    }

    /**
     * {@inheritdoc}
     */
    public function createResource(UserInterface $user, ?string $name = null): ResourceInterface
    {
        /** @var ResourceInterface $resource */
        $resource = new $this->resourceClass;

        if(!$name) {
            $name = $user->getUsername();
        }

        $resource->setCreatorId($user->getId());
        $resource->setName($name);

        $relation = $this->userResourceRelationService->createRelation($resource);
        $resource->getResourceUsersRelations()->add($relation);

        return $resource;
    }
}