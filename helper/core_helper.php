<?

function base_url($path) {
    
    return get_config('home_url').$path;
    
}

function css_url($path) {
    
    return get_config('home_url').'/assets/css/'.$path;
    
}

function script_url($path) {
    
    return get_config('home_url').'/assets/js/'.$path;
    
}

function get_config($key,$default=null) {
    
    global $config;
    
    return (isset($config[$key]))?$config[$key]:$default;
    
}