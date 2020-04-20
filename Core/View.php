<?php

class View
{
    //Rendering page with incomming data
    public static function render($file, $data = [])
    {
        require_once('./Views/' . $file . '.php');
    }
}
