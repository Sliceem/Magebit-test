<?php

require_once 'Config.php';

class Route
{
    private $class;
    private $method;
    private $arg = '';


    public function __construct()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $this->class = ucfirst(trim($url[1]));
        $this->method = trim($url[2]);
        $this->arg = trim($url[3]);
    }


    public function run()
    {
        $pathToClass = './Controller/' . $this->class . '.Controller.php';
        if (file_exists($pathToClass)) {
            require_once($pathToClass);
            $obj = new $this->class;
        } else {
            require_once './Controller/Index.Controller.php';
            new Index;
        }
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getArg()
    {
        return $this->arg;
    }
}
