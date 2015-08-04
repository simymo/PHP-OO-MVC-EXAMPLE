<?php

if (! function_exists('route')) {
    /**
     * Return the url of a route
     *
     * @param  string  $key
     * @return string  url
     */
    function route($key)
    {
        return 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?route='. $key;
    }
}

if (! function_exists('redirect')) {
    /**
     * redirect to a specified url
     *
     * @param  string
     * @return string
     */
    function redirect($url)
    {
        return header('Location: '. $url);
    }
}


if (! function_exists('config')) {
    /**
     * Return the configuration settings in Libraries/Config/*.php
     *
     * @param  string  $key
     * @return mixed setting
     */
    function config($key)
    {
        $path = explode('.', $key);

        if (file_exists('Libraries/Config/' . $path[0] . '.php')) {
            $config = include('Libraries/Config/' . $path[0] . '.php');

            if (isset($path[1])) {
                return isset($config[$path[1]])? $config[$path[1]] : null;
            }

            return $config;
        }

        return null;
    }
}
