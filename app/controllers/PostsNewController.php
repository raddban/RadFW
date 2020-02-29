<?php

namespace app\controllers;


class PostsNewController extends AppController
{
    public $layout = 'main';
    public function indexAction()
    {
        $this->view = 'index';
    }

    public function contactsAction()
    {
        $this->layout = 'default';
        $this->view = 'contacts';
    }
}