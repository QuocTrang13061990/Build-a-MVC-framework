<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

$app = new Application();


$app->router->get('/git/mvcframework/public/', function(){
    return 'index';
});
$app->router->get('/git/mvcframework/contact/', function(){
    return 'contact';
});


$app->run();
