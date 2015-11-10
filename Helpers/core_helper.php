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
 * @param string $path
 * @return string
 */
function css_url($path)
{
    return get_config('home_url') . '/assets/css/' . $path;
}

/**
 * @param string $path
 * @return string
 */
function script_url($path)
{
    return get_config('home_url') . '/assets/js/' . $path;
}

/**
 * @param string $path
 * @return string
 */
function asset_url($path)
{
    return get_config('home_url') . '/assets/' . $path;
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

/**
 * @param string $var1
 * @param string $var2
 * @param string $return
 * @return null|string
 */
function is_active($var1, $var2, $return = 'active')
{
    return ($var1 === $var2) ? $return : false;
}

/**
 * @param string $segment
 * @return string|bool
 */
function uri($segment)
{
    if (isset($_GET['uri'])) {
        $uri = explode('/', $_GET['uri']);
        $uri = array_filter($uri);
    }

    return (isset($uri[$segment])) ? $uri[$segment] : false;
}

/**
 * @param string $string
 * @return string
 */
function get_slug($string)
{
    // replace non letter or digits by -
    $string = preg_replace('~[^\\pL\d]+~u', '-', $string);

    // trim
    $string = trim($string, '-');

    // transliterate
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

    // lowercase
    $string = strtolower($string);

    // remove unwanted characters
    $string = preg_replace('~[^-\w]+~', '', $string);

    if (empty($string)) {
        return 'n-a';
    }

    return $string;
}

/**
 * @param string $date
 * @param string $format
 * @param bool$is_timestamp
 * @return bool|string
 */
function format_date($date, $format = 'd-m-Y', $is_timestamp = false)
{

    if (!$is_timestamp) {

        $date = strtotime($date);
    }

    return date($format, $date);
}

/**
 * @param float $price
 * @param bool $prefix
 * @return string
 */
function format_price($price, $prefix = false)
{
    $price = str_replace(',', '.', $$price);

    return $prefix . number_format($price, '2', ',', '.');
}