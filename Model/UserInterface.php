<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 4:33
 */

namespace VaderLab\AclBundle\Model;


use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface as BaseUserInterface;

interface UserInterface extends BaseUserInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return Collection
     */
    public function getResourcesIds(): Collection;

    /**
     * @param Collection $resourcesIds
     * @return UserInterface
     */
    public function setResourcesIds(Collection $resourcesIds): UserInterface;
}