<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.2018
 * Time: 14:37
 */

namespace VaderLab\AclBundle\Subscriber\Doctrine;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use VaderLab\AclBundle\Model\EntityInterface;


class EntityChangeSubscriber implements EventSubscriber
{
    /**
     * @var ArrayCollection
     */
    protected $updateEntities;
    /**
     * @var ArrayCollection
     */
    protected $createEntities;

    public function __construct()
    {
        $this->updateEntities = new ArrayCollection();
        $this->createEntities = new ArrayCollection();
    }

    public function getSubscribedEvents()
    {
        return [
            'prePersist',
            'preUpdate',
            'postFlush'
        ];
    }

    public function postFlush()
    {
    }

    public function updateAccess(LifecycleEventArgs $args)
    {
    }

    protected function unpdateEntityAccess(LifecycleEventArgs $args)
    {
    }

    /**
     * @param EntityInterface $entity
     */
    protected function push(EntityInterface $entity)
    {
        $entitiesColl = !$entity->getId() ? $this->createEntities : $this->updateEntities;

        if($entitiesColl->contains($entity)) {
            return;
        }

        $entitiesColl->add($entity);
    }
}