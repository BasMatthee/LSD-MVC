<?php

/**
 * @param string $key
 * @param string $default
 * @return string
 */
function get_config($key, $default = null)
{
    global $config;

    return (isset($config[$key])) ? $config[$key] : $default;
}

/**
 * @param string $path
 * @return string
 */
function base_url($path = '')
{
    return get_config('home_url') . '/' . $path;
}

/**
 * @param string $location
 * @param bool $external
 */
function redirect($location, $external = false)
{
    if ($external) {
        header('Location: ' . $location);
        exit;
    } else {
        header('Location: ' . base_url($location));
        exit;
    }
}