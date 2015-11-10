<?php
namespace Application\System;

/**
 * Autoloader
 *
 * @author Bas Matthee <basmatthee@gmail.com>
 * @copyright Copyright (c) 2015 LEVIY <https://www.leviy.com>
 * @package Application\System
 */
final class Autoloader
{
    static public function loader($className)
    {
        $filename = str_replace('\'', DIRECTORY_SEPARATOR, $className) . ".php";
        $filename = str_replace('\\Application\\', '', $filename);
        $filename = str_replace('Application\\', '', $filename);

        if (false !== file_exists($filename)) {
            include($filename);

            if (false !== class_exists($className)) {
                return true;
            }
        }

        return false;
    }
}