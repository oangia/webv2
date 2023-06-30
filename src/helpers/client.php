<?php
function get_user_ip() {
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];

    if(filter_var( $client, FILTER_VALIDATE_IP ))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function get_user_agent() {
    return __server("HTTP_USER_AGENT");
}

function is_mobile() {
    if (__get('m') == 1) return true;
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", get_user_agent());
}

function __cookie($key, $default = '')
{
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
}

function __server($key, $default = '')
{
    return isset($_SERVER[$key]) ? $_SERVER[$key] : $default;
}

function __get($key, $default = '') {
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function __session($key, $default = '') {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
}

function __post($key, $default = '') {
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function get_protocol() {
    if (isset($_SERVER['HTTPS'])
        && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)
        || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
    ) {
            return 'https';
    }

    return 'http';
}

function host_name() {
    return __server('HTTP_HOST', '127.0.0.1');
}

function site_url() {
    return get_protocol() . '://' . host_name();
}
