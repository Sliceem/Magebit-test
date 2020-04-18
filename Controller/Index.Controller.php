<?php

require_once './Core/View.php';

class Index
{
    public function __construct()
    {
        View::render('index');
    }   
}