<?php

require_once('Libraries/autoload.php');
require_once('Libraries/helpers.php');

$route = ucfirst(trim($_GET['route']));

if(empty($_GET['route']) || !is_string($_GET['route']) || !class_exists('\Libraries\Controllers\\'.$route)){
    return redirect(route('home'));
}

$class = '\Libraries\Controllers\\'.$route;
$controller = new $class;

return $controller->response();
