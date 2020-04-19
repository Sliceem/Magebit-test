<?php

require_once './Core/DB.php';
require_once 'Authentication.Model.php';

class Login extends Authentication
{

    protected $user;
    protected $loggedUser = false;

    public function checkUserExists(){
        if(password_verify($this->password, $this->searchUser()->user_password)){
            if($this->validateEmail() == $this->email){
                $this->loggedUser = true;
                $data = [
                    'username' =>$this->searchUser()->user_name,
                    'loggedUser' => true
                ];
                return $data;
            } else return $this->error;
        } else return $this->error;
    }

    public function searchUser(){
        $getUser = DB::getInstance()->searchUser($this->validateEmail());
        if ($getUser != null){
            return $getUser;
        }else $this->error['email_db'] = 'Email not found';
    }
}