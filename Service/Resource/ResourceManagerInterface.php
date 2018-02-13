<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.2018
 * Time: 14:57
 */

namespace VaderLab\AclBundle\Service\Resource;


use VaderLab\AclBundle\Model\ResourceInterface;
use VaderLab\AclBundle\Model\UserInterface;

interface ResourceManagerInterface
{
    /**
     * @param UserInterface $user
     * @param null|string $name
     * @return ResourceInterface
     */
    public function createResource(UserInterface $user, ?string $name = null): ResourceInterface;
}