<?php

require_once './Core/DB.php';

class Authentication
{
    protected $username;
    protected $email;
    protected $password;
    protected $error = [];

    public function __construct($data)
    {
        $this->username = filter_var($data['username'], FILTER_SANITIZE_STRING);
        $this->email = $data['email'];
        $this->password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    }

    //Validating Email
    protected function validateEmail()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return $this->email;
        } else $this->error['email'] = 'Email not valid, try once more';
    }

    
    public function AddingIfUniq($table, $email, $data)
    {
        $emailExists = DB::getInstance()->chechUniqEmail($table, $email);
        if (!$emailExists) {
            DB::getInstance()->addNewUser($this->table, $data);
        }
    }
}
