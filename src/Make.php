<?php

namespace NFePHP\NFe;

/**
 * Statically loads the Make class to the specified version
 *
 * @category  NFePHP
 * @package   NFePHP\NFe\Make
 * @copyright NFePHP Copyright (c) 2008 - 2017
 * @license   http://www.gnu.org/licenses/lgpl.txt LGPLv3+
 * @license   https://opensource.org/licenses/MIT MIT
 * @license   http://www.gnu.org/licenses/gpl.txt GPLv3+
 * @author    Roberto L. Machado <linux.rlm at gmail dot com>
 * @link      http://github.com/nfephp-org/sped-nfe for the canonical source repository
 */

class Make
{
    
    private static $available = [
        'v310'       => Factories\Make310::class,
        'v400'       => Factories\Make400::class
    ];
    
    /**
     * Call classes to build XML NFe
     * @param type $name
     * @param type $arguments
     * @return \NFePHP\NFe\className
     * @throws InvalidArgumentException
     */
    public static function __callStatic($name, $arguments)
    {
        $className = self::$available[strtolower($name)];
        if (empty($className)) {
            throw new InvalidArgumentException('Class not found.');
        }
        return new $className();
    }
}
