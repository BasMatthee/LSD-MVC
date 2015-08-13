<?

// Returns the configuration setting
/**
 * @param string $key
 */
function get_config($key,$default=null) {
    
    global $config;
    
    return (isset($config[$key]))?$config[$key]:$default;
    
}

// Returns the base URL with the given path
function base_url($path='') {
    
    return get_config('home_url').'/'.$path;
    
}

// Returns the CSS url
function css_url($path) {
    
    return get_config('home_url').'/assets/css/'.$path;
    
}

// Returns the JS url
function script_url($path) {
    
    return get_config('home_url').'/assets/js/'.$path;
    
}

// Returns the assets url
function asset_url($path) {
    
    return get_config('home_url').'/assets/'.$path;
    
}

// Redirection made even easier
/**
 * @param string $location
 */
function redirect($location,$external=false) {
    
    if ($external) {
        
        header('Location: '.$location);
        exit;
        
    } else {
        
        header('Location: '.base_url($location));
        exit;
        
    }
    
}

// Simple compare function with optional return value
function is_active($var1, $var2, $return = 'active') {
    
    return ($var1 === $var2) ? $return : null;
    
}

// Get an element from the URI
function uri($segmment) {
    
    if (isset($_GET['uri'])) {
        
        // Extract URI
        $uri = explode('/', $_GET['uri']);
        $uri = array_filter($uri);
        
    }
    
    return (isset($uri[$segmment])) ? $uri[$segmment] : false;
    
}

// Returns a sanitized version of the given string
function get_slug($string) {
    
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

// Formats any English formatted date string 
function format_date($date, $format = 'd-m-Y', $is_timestamp = false) {
    
    if (!$is_timestamp) {
        
        $date = strtotime($date);
        
    }
    
    return date($format, $date);
    
}

// Formats a float/ecimal number to a price
function format_price($price, $prefix = false) {
    
    $price = str_replace(',', '.', $$price);
    
    return $prefix.number_format($price, '2', ',', '.');
    
}