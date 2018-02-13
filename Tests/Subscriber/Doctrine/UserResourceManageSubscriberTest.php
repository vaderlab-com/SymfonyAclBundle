<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.2018
 * Time: 15:08
 */

namespace VaderLab\AclBundle\Tests\Subscriber\Doctrine;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\TwigBundle\Tests\TestCase;
use VaderLab\AclBundle\Model\UserInterface;
use VaderLab\AclBundle\Service\Resource\ResourceManagerInterface;
use VaderLab\AclBundle\Subscriber\Doctrine\UserResourceManageSubscriber;

class UserResourceManageSubscriberTest extends TestCase
{
    /**
     * @var MockObject|ResourceManagerInterface
     */
    private $resourceManagerMock;

    /**
     * @var UserResourceManageSubscriber
     */
    private $userResourceManageSubscriber;

    /**
     * @var MockObject|LifecycleEventArgs
     */
    protected $lifecycleEventArgsMock;

    /**
     * @var MockObject|ObjectManager
     */
    protected $objectManagerMock;

    /**
     * @var MockObject|UserInterface
     */
    private $userMock;

    /**
     * @param MockBuilder $builder
     * @return MockObject
     */
    protected function configureMock(MockBuilder $builder): MockObject
    {
        return $builder
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->getMock()
        ;
    }

    public function setUp(): void
    {
        $this->resourceManagerMock = $this->configureMock(
            $this->getMockBuilder(ResourceManagerInterface::class)
        );

        $this->lifecycleEventArgsMock = $this->configureMock(
            $this->getMockBuilder(LifecycleEventArgs::class)
        );

        $this->objectManagerMock = $this->configureMock(
            $this->getMockBuilder(ObjectManager::class)
        );

        $this->lifecycleEventArgsMock
            ->method('getObjectManager')
            ->willReturn($this->objectManagerMock);

        $this->userMock = $this->configureMock($this->getMockBuilder(UserInterface::class));
        $this->userMock
            ->method('getId')
            ->willReturn(1);


        $this->lifecycleEventArgsMock
            ->method('getObject')
            ->willReturn($this->userMock)
        ;

        $this->userResourceManageSubscriber = new UserResourceManageSubscriber($this->resourceManagerMock);

    }

    public function tearDown(): void
    {
        $this->resourceManagerMock = null;
    }

    public function testConstructor(): void
    {
        $this->assertInstanceOf(EventSubscriber::class, $this->userResourceManageSubscriber);
    }

    public function testGetSubscribedEvents(): void
    {
        $this->assertEquals(
            [ 'postPersist' ],
            $this->userResourceManageSubscriber->getSubscribedEvents()
        );
    }

    public function testPostPersist(): void
    {
        $this->resourceManagerMock
            ->expects($this->once())
            ->method('createResource');

        $this->objectManagerMock
            ->expects($this->once())
            ->method('persist');

        $this->objectManagerMock
            ->expects($this->once())
            ->method('flush');

        $this->userResourceManageSubscriber->postPersist($this->lifecycleEventArgsMock);
    }
}