<?php

require_once './Core/DB.php';
require_once 'Authentication.Model.php';

class Register extends Authentication
{

    public function signup()
    {
        if ($this->validateEmail() && $this->validateUsername() && $this->validatePassword()) {
            if ($this->checkEmailInDB()) {
                $data = [
                    'user_name'     => $this->validateUsername(),
                    'user_email'    => $this->validateEmail(),
                    'user_password' => $this->validatePassword()
                ];
                DB::getInstance()->addNewUser($data);
            } else return $this->error;
        } else return $this->error;
    }

    private function validateUsername()
    {
        if (strlen($this->username) > 4  && strlen($this->username) < 15) {
            return $this->username;
        } else $this->error['username'] = 'Username must be more than 4 and less than 15 symbols';
    }

    private function validatePassword()
    {
        if (strlen($this->password) > 6) {
            return password_hash($this->password, PASSWORD_DEFAULT);
            // return $this->password;
        } else $this->error['password'] = 'Password must be more than 6 symbols';
    }

    public function checkEmailInDB()
    {
        $result = DB::getInstance()->chechUniqEmail($this->validateEmail());
        if ($result == 0) {
            return true;
        } else $this->error['user_exists'] = 'User With this Email Already Exists!';
    }
}
