<?php

$config = [
    'components' => [
        'cache' => 'classes\Cache',
        'test' => 'classes\Test'
    ],
];

spl_autoload_register(function ($class){
    $file = str_replace('\\', '/', $class) . '.php';
//   $file = APP . "/controllers/$class.php";
    if(is_file($file))
    {
        require_once $file;
    }
});
class Registry
{




}

$app = Registry::instance();
$app->getList();
$app->test->go();
$app->test2 = 'classes\Test2';
$app->getList();
$app->test2->hello();