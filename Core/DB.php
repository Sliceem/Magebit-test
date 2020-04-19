<?php

require_once 'Config.php';

class Db
{
    private $pdo;
    private $errors = [];
    private static $instance = null;

    private function __construct(){
        $dsn = "mysql:host=".HOST.";dbname=".DBNAME;
        try{
            $this->pdo = new PDO($dsn, DBLOGIN, DBPASS);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            
        } catch (PDOException $err){
            throw new PDOException($err->getMessage());
        }
    }

    public static function instance(){
        if(!isset(self::$instance)){
            self::$instance == new DB;
        }
        return self::$instance;
    }

}