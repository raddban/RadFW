<?php


namespace vendor\core\base;


class View
{
    // Tekushij marshrut
    public $route = [];

    // Tekushij vid
    public $view;


    /*
     * Tekushij shablon
     * @var str
     * */
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {

        $this->route = $route;
        if ($layout === false)
        {
            $this->layout = false;
        }else
        {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;

    }

    public function render($vars)
    {
        if (is_array($vars))extract($vars);
        $file_name = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_name))
        {
            require $file_name;
        }else
        {
            echo "<p>Ne najden vid <b>$file_name</b></p>";
        }
        $content = ob_get_clean();

        if (false !== $this->layout)
        {
            $file_layout = APP . "/views/layout/{$this->layout}.php";
            if (is_file($file_layout))
            {
                require $file_layout;
            }else
            {
                echo "<p>Ne najden shablon <b>$file_layout</b></p>";
            }
        }

    }
}