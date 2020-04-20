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

    //Checking if connection exists
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    //Chechking Current email in DB
    public function chechUniqEmail($table, $email)
    {
        $sql = "SELECT * FROM $table WHERE user_email = '$email'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $emailCount = $stmt->rowCount();
        return $emailCount;
    }

    //Inserting new user to DB
    public function addNewUser($table, $data)
    {
        $columns = rtrim(implode(',', array_keys($data)), ',');
        $sql = "INSERT INTO $table ($columns) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $x = 1;
        foreach ($data as $key => $value) {
            $stmt->bindValue($x, $value);
            $x++;
        }
        $stmt->execute();
    }

    //Searching user By EMAIL
    public function searchUser($table, $email)
    {
        $sql = "SELECT * FROM $table WHERE user_email = '$email'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    //Update user
    public function updateUserInfo($table, $columns, $values, $email)
    {
        $sql = "UPDATE $table SET $columns WHERE user_email = '$email'";
        $stmt = $this->pdo->prepare($sql);
        $x = 1;
        foreach ($values as $key => $value) {
            $stmt->bindValue($x, $value);
            $x++;
        }
        $stmt->execute();
    }
}
