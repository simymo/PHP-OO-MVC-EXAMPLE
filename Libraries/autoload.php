<?php

function __autoload($classname)
{
    $filename = $classname .'.php';

    if (file_exists($filename)) {
        include_once($filename);
    }
}
