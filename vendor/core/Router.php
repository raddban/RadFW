<?php

namespace vendor\core;

class Router
{
//    public function __construct()
//    {
//        echo ('привет');
//    }

    protected static $routes = []; // budet soderzhatsja vesj massiv routov, po umolchaniju budet vsjevo dva marshruta
    protected static $route = []; // hranitsja tekushij marshrut, kotorij vizivajetsja po tekushemu url adresu

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    // Neobezateljnij metod, no mi sozdadim chtobi poluchatj vsju tablicu nashih marshrutov,
    // chtobi mogli raspechatatj i posmotretj chto v nej nahoditsja

    public static function getRoutes()
    {
        return self::$routes;
    }

    // metod kotorij vozvrashajet soderzhimoje svojstva $route
    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if(preg_match("#$pattern#i", $url, $matches))
            {
                foreach ($matches as $k => $v)
                {
                    if(is_string($k))
                    {
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action']))
                {
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']); // Delajem zaglavnuju bukvu papki kontrollera
                self::$route = $route;
//                debug($route);
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if(self::matchRoute($url))
        {

            $controller ='app\controllers\\' .  self::$route['controller'] . 'Controller';
            if(class_exists($controller))
            {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj, $action))
                {
                    $cObj->$action();
                    $cObj->getView();
                }else
                {
                    echo "Metod <b>$controller::$action</b> ne najden";
                }
            }else
            {
                echo "Kontroller <b>$controller</b> ne najden";
            }
        }
        else
        {
            http_response_code(404);
            include '404.html';
        }
    }

    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', (ucwords(str_replace('-', ' ', $name))));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url)
    {
        if ($url)
        {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '='))
            {
                return rtrim($params[0], '/');
            }else
            {
                return '';
            }
        }
    }
}