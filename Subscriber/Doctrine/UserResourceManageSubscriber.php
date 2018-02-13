<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.2018
 * Time: 14:51
 */

namespace VaderLab\AclBundle\Subscriber\Doctrine;


use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use VaderLab\AclBundle\Model\UserInterface;
use VaderLab\AclBundle\Service\Resource\ResourceManagerInterface;

class UserResourceManageSubscriber implements EventSubscriber
{
    private $resourceManager;

    public function __construct(ResourceManagerInterface $resourceManager)
    {
        $this->resourceManager = $resourceManager;
    }

    public function getSubscribedEvents()
    {
        return [
            'postPersist'
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $user = $args->getObject();

        if(!($user instanceof UserInterface)) {
            return;
        }

        $resource = $this->resourceManager->createResource($user);

        $entityManager = $args->getObjectManager();
        $entityManager->persist($resource);
        $entityManager->flush();
    }
}