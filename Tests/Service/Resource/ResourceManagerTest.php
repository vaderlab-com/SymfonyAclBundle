<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.2018
 * Time: 12:35
 */

namespace VaderLab\AclBundle\Tests\Service\Resource;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use VaderLab\AclBundle\Entity\Resource;
use VaderLab\AclBundle\Entity\UserRelation;
use VaderLab\AclBundle\Model\ResourceInterface;
use VaderLab\AclBundle\Model\UserInterface;
use VaderLab\AclBundle\Service\Access\AccessMaskBuilderInterface;
use VaderLab\AclBundle\Service\Resource\ResourceManager;
use VaderLab\AclBundle\Service\Resource\ResourceUserRelationManager;

class ResourceManagerTest extends TestCase
{
    public function testCreateResource()
    {

        $resName = 'Resource name';
        $creatorId = 1;
        $exceptedResource = new Resource();
        $exceptedResource->setName($resName);
        $exceptedResource->setCreatorId($creatorId);

        $creator = $this
            ->getMockBuilder(UserInterface::class)
            ->disallowMockingUnknownTypes()
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->getMock()
        ;

        $creator
            ->method('getId')
            ->willReturn($creatorId);

        $resourceUserRelation = new UserRelation();

        $resourceUserRelationManagerStub = $this
            ->getMockBuilder(ResourceUserRelationManager::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->getMock()
        ;

        $resourceUserRelationManagerStub
            ->method('createRelation')
            ->willReturn($resourceUserRelation);

        $resourceManager = new ResourceManager($resourceUserRelationManagerStub, Resource::class);

        $actualResource = $resourceManager->createResource($creator, $resName);

        $this->assertInstanceOf(ResourceInterface::class, $actualResource);
        $this->assertEquals($resourceUserRelation, $actualResource->getResourceUsersRelations()[0]);
        $this->assertEquals($exceptedResource->getCreatorId(), $actualResource->getCreatorId());
        $this->assertEquals($exceptedResource->getName(), $actualResource->getName());
    }
}