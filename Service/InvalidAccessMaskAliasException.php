<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 13.02.2018
 * Time: 11:45
 */

namespace VaderLab\AclBundle\Service;


use Throwable;

class InvalidAccessMaskAliasException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        $message = sprintf('Invalid access alias: "%s"', $message);

        parent::__construct($message, $code, $previous);
    }
}