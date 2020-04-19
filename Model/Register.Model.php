<?php

require_once './Core/DB.php';

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
        if ($this->validateEmail() && $this->validateUsername() && $this->validatePassword()){
            // return $this->validateEmail() . ' - ' . $this->validateUsername() . ' - ' . $this->validatePassword();
            $var = DB::instance()->chechUniqEmail();
            return $var;
        }else return $this->error;
    }

    private function validateEmail(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return $this->email;
        }else $this->error['email'] = 'Email not valid, try once more';
    }

    private function validateUsername(){
        if(strlen($this->username) > 4  && strlen($this->username) < 15){
            return $this->username;
        }else $this->error['username'] = 'Username must be more than 4 and less than 15 symbols';
    }

    private function validatePassword(){
        if(strlen($this->password)> 6){
            return password_hash($this->password, PASSWORD_DEFAULT);
        }else $this->error['password'] = 'Password must be more than 6 symbols';
    }

}