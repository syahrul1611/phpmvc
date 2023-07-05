<?php

/**
 * Calling configuration.
 * @param string $key Name of Config.
 * @return string|array|int Value of Config.
 */
function config($key)
{
    $file = explode('.',$key)[1];
    $key = explode('.',$key)[0];
    $array = include '../app/config/'.$file.'.php';
    return $array[$key];
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
    return $protocol.$_SERVER['HTTP_HOST'].'/'.config('folder_name.app').'/public/'.$path;
}