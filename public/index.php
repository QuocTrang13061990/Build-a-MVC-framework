<?php
echo $_SERVER['QUERY_STRING'];exit;
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

$app = new Application();


$app->router->get('/public/', function(){
    return 'index';
});
$app->router->get('/views/', 'contact');



$app->run();
