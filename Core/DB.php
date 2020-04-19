<?php

require_once 'Config.php';

class DB
{
    private $pdo;
    private static $instance = null;

    private function __construct()
    {
        $dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
        try {
            $this->pdo = new PDO($dsn, DBLOGIN, DBPASS);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $err) {
            echo 'Error accured: ' . $err->getMessage() . BR;
            die();
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function chechUniqEmail($email)
    {
        $sql = "SELECT * FROM users WHERE user_email = '$email'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $emailCount = $stmt->rowCount();
        return $emailCount;
    }

    public function addNewUser($data)
    {
        $columns = rtrim(implode(',', array_keys($data)), ',');
        $sql = "INSERT INTO users ($columns) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $x = 1;
        foreach ($data as $key => $value) {
            $stmt->bindValue($x, $value);
            $x++;
        }
        $stmt->execute();
    }

    public function searchUser($email){
        $sql = "SELECT * FROM users WHERE user_email = '$email'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }
}
