<?php

require_once './Model/UserData.Model.php';
require_once './Core/View.php';

class User
{
    public $table = 'user_data';
    public $postData;
    public $email;

    public function __construct()
    {
        $this->postData = $_POST;
        $this->email = $_POST['user_email'];
    }
    public function updateUser()
    {
        $obj = new UserData();
        $obj->updateUserData($this->postData);
        $data = DB::getInstance()->searchUser($this->table, $this->email);

        View::render('loggedUser', $data);
    }
}
