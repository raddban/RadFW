<?php
namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{
    public $layout = 'default';
    public function indexAction()
    {
//        App::$app->getList();
//        $this->layout = false;
//        $this->layout = 'main';
//        $this->view = 'test';
//        $res = $model->query("CREATE TABLE posts2 SELECT * FROM kikstartapp.posts");
//        $posts = $model->findAll();
//        $post = $model->findOne(1);
//        debug($post);
//        $data = $model->findBySql("SELECT * FROM posts ORDER BY id ASC");
//        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE surname LIKE ?", ['%a%']);
//        $data = $model->findLike('r', 'name');
//        debug($data);


        $model = new Main();
//        $posts = App::$app->cache->get('posts');
        $posts = App::$app->cache->delete('posts');
        if (!$posts)
        {
            $posts = \R::findAll('posts');
//            App::$app->cache->set('posts', $posts, 3600*24);
        }


//        echo date('Y-m-d H:i', time());
//        echo "<br>";
//        echo date('Y-m-d H:i', 1583091738);
//        $post = \R::findOne('posts', 'id = 1');
//        debug($post);
        $menu  = $this->menu;
//        $this->setMeta('Main Page', 'Descr of this Page', 'Keywords of this Page');
//        $this->setMeta($post->title, $post->description, $post->keywords);
        $meta = $this->meta;
        $this->set(compact(  'posts', 'menu', 'meta'));
    }


}