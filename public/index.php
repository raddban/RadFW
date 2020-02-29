<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(-1);


use vendor\core\Router;


$query = rtrim($_SERVER['QUERY_STRING'], '/'); // otlavlivajem to chto poljzovatelj zaprosil, tot ili inoj marshrut
require '../vendor/libs/functions.php'; // tam nahoditsja funkcija debug

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('LIBS', dirname(__DIR__) . '/vendor/libs');
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LAYOUT', 'default');

spl_autoload_register(function ($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
//   $file = APP . "/controllers/$class.php";
   if(is_file($file))
   {
       require_once $file;
   }
});

new \vendor\core\App;

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'about']);

// Defoltnije pravila
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


//debug(Router::getRoutes()); // sozdannaja funkcija dlja otobrazhenija debug




Router::dispatch($query);