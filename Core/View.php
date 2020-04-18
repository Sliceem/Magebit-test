<?php

class View
{
    public static function render($file, $data = [])
    {
        require_once('./Views/' . $file . '.php');
    }
}
