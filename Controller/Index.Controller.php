<?php

require_once './Core/View.php';

class Index
{
    //Rendering default page
    public function __construct()
    {
        View::render('index');
    }   
}