<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    public $layout = 'default';
    public function indexAction()
    {
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
//        $posts = \R::findAll('posts');
        $post = \R::findOne('posts', 'id = 1');
//        debug($post);
        $menu  = $this->menu;
//        $this->setMeta('Main Page', 'Descr of this Page', 'Keywords of this Page');
        $this->setMeta($post->title, $post->description, $post->keywords);
        $meta = $this->meta;
        $this->set(compact(  'post', 'menu', 'meta'));
    }


}