<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 4:55
 */

namespace VaderLab\AclBundle\Service\Access;


interface AccessMaskBuilderInterface
{
    /**
     * Access show flag
     */
    const A_READ        = 0x1;

    /**
     * Access create flag
     */
    const A_CREATE      = 0x2;

    /**
     * Access edit flag
     */
    const A_EDIT        = 0x4;

    /**
     * Access delete flag
     */
    const A_DELETE      = 0x8;

    /**
     * @param array $maskAliases
     * @return int
     */
    public function createAccessMask(array $maskAliases): int;
}