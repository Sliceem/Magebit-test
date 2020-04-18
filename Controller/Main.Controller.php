<?php

require_once './Core/View.php';

class Main
{

    public function __construct()
    {
        View::render('loginRegisterForm');
    }  
    public function loginRegisterForm()
    {
        View::render('loginRegisterForm');
    }
}
