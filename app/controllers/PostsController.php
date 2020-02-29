<?php
namespace app\controllers;

use app\models\Main;

class PostsController extends AppController
{

//    public $layout = 'default';

    public function indexAction()
    {

    }

    public function testAction()
    {
        $this->layout = 'main';
        $this->view = 'test';
    }

    public function testPageAction()
    {
//        $this->layout = 'main';
        $this->view = 'testPage' ;
    }

    public function before()
    {
        echo 'Posts::before';

    }
}