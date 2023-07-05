<?php

/**
 * Calling configuration.
 * @param string $key Name of Config.
 * @return any Value of Config.
 */
function config($key)
{
    $config = require_once '../app/config/app.php';
    return $config[$key];
}

/**
 * Calling asset in public folder.
 * @param string $path Path to asset file.
 * @return asset Return asset file.
 */
function asset($path)
{
    // get server protocol
    if(
        isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
    ){ $protocol = 'https://'; }else{ $protocol = 'http://'; }
    return $protocol.$_SERVER['HTTP_HOST'].'/'.config('APP_FOLDER_NAME').'/public/'.$path;
}