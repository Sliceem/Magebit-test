<?php

class Register
{
    private $username;
    private $email;
    private $password;
    private $error = [];

    public function __construct($data){
        $this->username = filter_var($data['username'],FILTER_SANITIZE_STRING);
        $this->email = $data['email'];
        $this->password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    }

    public function signup(){
        $dataT = ['heloo', '22'];
        return $dataT;
    }

    private function validateEmail(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return $this->email;
        }else $this->error['email'] = 'Email not valid, try once more';
    }


}