<?php

require_once './Core/View.php';

class Main
{
    public function __construct()
    {
        $this->loginRegisterForm();
    }

    public function loginRegisterForm(){
        View::render('loginRegisterForm');
    }
}