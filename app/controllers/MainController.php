<?php
namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{
    public $layout = 'default';
    public function indexAction()
    {


        $model = new Main();
//        $posts = App::$app->cache->get('posts');
//        $posts = App::$app->cache->delete('posts');
//        if (!$posts)
//        {
//            $posts = \R::findAll('posts');
////            App::$app->cache->set('posts', $posts, 3600*24);
//        }

        $posts = \R::findAll('posts');

        $menu  = $this->menu;
        $meta = $this->meta;
        $this->set(compact(  'posts', 'menu', 'meta'));
    }

    public function testAction()
    {
        $this->layout = 'test';
    }

}