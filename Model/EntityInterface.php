<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 4:24
 */

namespace VaderLab\AclBundle\Model;


interface EntityInterface
{
    public function getId(): ?int;
    /**
     * @return int|null
     */
    public function getResourceId(): ?int;

    /**
     * @param int $resourceId
     * @return EntityInterface
     */
    public function setResourceId(int $resourceId): EntityInterface;
}