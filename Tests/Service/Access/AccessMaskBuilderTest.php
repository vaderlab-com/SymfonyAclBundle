<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.2018
 * Time: 11:26
 */

namespace VaderLab\AclBundle\Tests\Service\Access;


use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use VaderLab\AclBundle\Service\Access\AccessMaskBuilderInterface;
use VaderLab\AclBundle\Service\Access\AccessMaskBuilder;
use VaderLab\AclBundle\Service\InvalidAccessMaskAliasException;

class AccessMaskBuilderTest extends TestCase
{
    /**
     * @throws InvalidAccessMaskAliasException
     */
    function testCreateAccessMask(): void
    {
        $maskBuikder = $this->getMaskBuilder();

        $exceptedFlag = AccessMaskBuilderInterface::A_CREATE |
            AccessMaskBuilderInterface::A_DELETE |
            AccessMaskBuilderInterface::A_EDIT |
            AccessMaskBuilderInterface::A_READ
            ;

        $realFlag = $maskBuikder->createAccessMask([
            'read', 'edit', 'create', 'delete'
        ]);

        $this->assertEquals($exceptedFlag, $realFlag);

        $exceptedFlag ^= AccessMaskBuilderInterface::A_READ;

        $realFlag = $maskBuikder->createAccessMask([
            'edit', 'create', 'delete'
        ]);

        $this->assertEquals($exceptedFlag, $realFlag);
    }

    /**
     * @throws InvalidAccessMaskAliasException
     */
    public function testCreateInvalidAccessMaskException(): void
    {
        $this->expectException(InvalidAccessMaskAliasException::class);

        $maskBuilder = $this->getMaskBuilder();
        $maskBuilder->createAccessMask([
            'create', 'read', 'edit', 'invalid_alias'
        ]);

    }

    /**
     *
     */
    public function testGetAccessFlagAliases(): void
    {

        $mb = $this->getMaskBuilder();
        $excepted = [
            'read'      => AccessMaskBuilderInterface::A_READ,
            'edit'      => AccessMaskBuilderInterface::A_EDIT,
            'create'    => AccessMaskBuilderInterface::A_CREATE,
            'delete'    => AccessMaskBuilderInterface::A_DELETE,
        ];

        $this->assertEquals($excepted, $mb->getAccessAliases());
    }

    /**
     * @return AccessMaskBuilder
     */
    protected function getMaskBuilder(): AccessMaskBuilder
    {
        return new AccessMaskBuilder();
    }
}