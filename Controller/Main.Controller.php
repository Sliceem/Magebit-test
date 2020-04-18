<?php

require_once './Core/View.php';

class Main
{
    public $data = [];

    public function __construct()
    {
        $this->data['username'] = trim($_POST['username']);
        $this->data['email'] = trim($_POST['email']);
        $this->data['password'] = trim($_POST['email']);
    }

    public function register()
    {
        var_dump($this->data);
    }
}
