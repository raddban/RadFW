<?php


namespace app\controllers;



use app\models\Main;

class PageController extends AppController
{
//    public $layout = 'main';
    public function indexAction()
    {
//        $this->view = 'index';
    }

    public function aboutAction()
    {
//        $this->layout = 'main';
        $model = new Main;
        $menu  = $this->menu;
        $this->set(compact('menu'));
    }


}