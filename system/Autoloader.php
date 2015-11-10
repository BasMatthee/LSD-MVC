<?php
namespace Skeleton\System;

/**
 * Autoloader
 *
 * @author Bas Matthee <basmatthee@gmail.com>
 * @copyright Copyright (c) 2015 LEVIY <https://www.leviy.com>
 * @package Skeleton\System
 */
final class Autoloader
{
    static public function loader($className)
    {
        $filename = str_replace('\'', DIRECTORY_SEPARATOR, $className) . ".php";
        $filename = str_replace('\\Skeleton\\', '', $filename);
        $filename = str_replace('Skeleton\\', '', $filename);

        if (false !== file_exists($filename)) {
            include($filename);

            if (false !== class_exists($className)) {
                return true;
            }
        }

        return false;
    }
}