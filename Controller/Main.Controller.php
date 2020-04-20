<?php

require_once './Core/DB.php';
require_once './Model/Register.Model.php';
require_once './Model/Login.Model.php';
require_once './Model/UserData.Model.php';
require_once './Core/View.php';

class Main
{
    public $data = [];

    public function __construct()
    {
        $this->data['username'] = trim($_POST['username']);
        $this->data['email'] = trim($_POST['email']);
        $this->data['password'] = trim($_POST['password']);
        $this->data['submit'] = trim($_POST['submit']);
    }

    //Registering new User
    public function register()
    {
        $obj = new Register($this->data);
        $register_answer = $obj->signup();
        View::render('index', $register_answer);
    }

    //Logging user
    public function userLogin()
    {
        $obj = new Login($this->data);
        $result = $obj->checkUserExists();
        if ($result['loggedUser']) {
            $obj = new UserData();
            $data = $obj->showUserData($result['user_email']);
            View::render('loggedUser', $data);
        } else View::render('index', $result);
    }
}
