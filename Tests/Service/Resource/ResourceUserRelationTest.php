<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.2018
 * Time: 13:40
 */

namespace VaderLab\AclBundle\Tests\Service\Resource;


use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use VaderLab\AclBundle\Entity\Resource;
use VaderLab\AclBundle\Entity\UserRelation;
use VaderLab\AclBundle\Service\Access\AccessMaskBuilderInterface;
use VaderLab\AclBundle\Service\Resource\ResourceUserRelationManager;

class ResourceUserRelationTest extends TestCase
{

    public function getUserRelationManager()
    {
        $maskBuilder = $this
            ->getMockBuilder(AccessMaskBuilderInterface::class)
            ->disableOriginalClone()
            ->disableOriginalConstructor()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $maskBuilder
            ->method('createAccessMask')
            ->willReturn($this->getExpectedMask())
        ;

        $userRelationManager = new ResourceUserRelationManager($maskBuilder, UserRelation::class);

        return $userRelationManager;
    }

    /**
     * @return int
     */
    public function getExpectedMask(): int
    {
        return
            AccessMaskBuilderInterface::A_READ |
            AccessMaskBuilderInterface::A_EDIT |
            AccessMaskBuilderInterface::A_DELETE |
            AccessMaskBuilderInterface::A_CREATE
            ;
    }

    public function testCreateRelation(): void
    {
        $expectedMask = $this->getExpectedMask();
        $creatorId = 1;
        $userRelationManager = $this->getUserRelationManager();
        $resource = new Resource();
        $resource->setCreatorId($creatorId);

        $relation = $userRelationManager->createRelation($resource);

        $this->assertEquals($resource, $relation->getResource());
        $this->assertEquals($creatorId, $relation->getUserId());
        $this->assertEquals($expectedMask, $relation->getAccessMask());
    }

    public function testCreateOwnerAccessMask(): void
    {
        $userRelationManager = $this->getUserRelationManager();
        $expected = $this->getExpectedMask();

        $this->assertEquals($expected, $userRelationManager->createOwnerAccessMask());
    }
}