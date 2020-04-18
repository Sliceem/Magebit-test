<?php

require_once 'Config.php';

class Db
{
    private $pdo;
    private $errors = [];

    private function connect(){
        $dsn = "mysql:host=".HOST.";dbname=".DBNAME;
        try{
            $this->pdo = new PDO($dsn, DBLOGIN, DBPASS);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $err){
            throw new PDOException($err->getMessage());
        }
    }

    

}