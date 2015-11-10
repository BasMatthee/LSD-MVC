<?php
namespace Skeleton\Application\Asset;

/**
 * AssetHelper
 *
 * @author Bas Matthee <basmatthee@gmail.com>
 * @copyright Copyright (c) 2015 Bas Matthee <http://www.bas-matthee.nl>
 * @package AssetHelper
 */
class AssetsHelper
{
    /** @type array */
    private $assets = array(
        'css' => array(),
        'js' => array(),
    );

    /**
     * @param string $type
     * @param string $file
     * @param string|null $identifier
     * @param mixed|null $dependency
     */
    public function add($type, $file, $identifier = null, $dependency = null)
    {
        $asset = array(
            'file' => $file,
            'identifier' => $identifier,
        );

        if (null !== $dependency) {
            $asset['dependency'] = $dependency;
        }

        $this->assets[$type][] = $asset;
    }

    /**
     * @param string $type
     */
    public function output($type)
    {
        $results = array();

        foreach ($this->assets[$type] as $key => $asset) {
            $results[] = $this->sort($this->assets[$type], $asset['identifier']);
        }

        array_multisort($results, SORT_ASC, $this->assets[$type]);

        foreach ($this->assets[$type] as $asset) {
            if ('css' === $type) {
                echo '<link rel="styleheet" type="text/css" href="' . $asset['file'] . '"/>' . PHP_EOL;
            }

            if ('js' === $type) {
                echo '<script type="text/javascript" src="' . $asset['file'] . '"></script>' . PHP_EOL;
            }
        }
    }

    /**
     * @param array $array
     * @param string $identifier
     * @param array $reference
     * @return int
     */
    function sort($array, $identifier, $reference = array())
    {
        if (is_array($identifier) && isset($identifier[0])) {
            $identifier = $identifier[0];
        }

        if (!isset($array[$identifier]['dependency'])) {
            return 0;
        }

        if (in_array($identifier, $reference)) {
            return -1;
        }

        $reference[] = $identifier;

        $result = $this->sort($array, $array[$identifier]['dependency'], $reference);

        return ($result == -1 ? -1 : $result + 1);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'assets';
    }
}