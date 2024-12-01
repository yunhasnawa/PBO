<?php

namespace src;

class App
{
    public function __construct()
    {
    }

    public function run()
    {
        $controller = new Controller();
        $controller->index();
    }
}