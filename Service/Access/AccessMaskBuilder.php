<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.18
 * Time: 4:57
 */

namespace VaderLab\AclBundle\Service\Access;


use VaderLab\AclBundle\Service\Access\AccessMaskBuilderInterface;
use VaderLab\AclBundle\Service\InvalidAccessMaskAliasException;

/**
 * Class AccessMaskBuilder
 */
class AccessMaskBuilder implements AccessMaskBuilderInterface
{
    /**
     * @param array $maskAliases
     * @return int
     * @throws InvalidAccessMaskAliasException
     */
    public function createAccessMask(array $maskAliases): int
    {
        $aliases = $this->getAccessAliases();
        $mask = 0x0;

        foreach ($maskAliases as $alias) {
            if(!isset($aliases[$alias])) {
                throw new InvalidAccessMaskAliasException($alias);
            }

            $mask |= $aliases[$alias];
        }

        return $mask;
    }

    /**
     * @return array
     */
    public function getAccessAliases(): array
    {
        return [
            'read'      => self::A_READ,
            'edit'      => self::A_EDIT,
            'create'    => self::A_CREATE,
            'delete'    => self::A_DELETE,
        ];
    }
}