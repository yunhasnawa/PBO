<?php

namespace framework;

use src\BerandaController;

class App
{
    private $_routes;

    public function __construct()
    {
        $this->_routes = [];
    }

    public function setRoutes($routes)
    {
        $this->_routes = $routes;
    }

    public function run()
    {
        // $controller = new BerandaController();
        // $controller->index();

        $route = $this->_findRoute(); // 'BerandaController@index'

        $split = explode('@', $route); // ['BerandaController', 'index']

        $controllerName = $split[0]; // 'BerandaController'
        $methodName = $split[1]; // 'index'

        // Controller punya namespace
        $controllerName = 'src\\' . $controllerName;

        $controller = new $controllerName();

        $controller->$methodName();
    }

    private function _findRoute()
    {
        // Ambil URL yang diminta user
        // /buku-kontak-pbo/index.php
        $url = $_SERVER['REQUEST_URI'];

        // Cari controller yang sesuai
        foreach ($this->_routes as $route => $controllerMethod)
        {
            // '/index.php' => 'BerandaController@index',
            if($route === $url)
            {
                return $controllerMethod; // 'BerandaController@index'
            }
        }

        die('<h1>[Polinemavel] 404 Not Found</h1>');

        return '';
    }
}