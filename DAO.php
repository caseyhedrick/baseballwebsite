<?php

class Dao
{
    private $host = 'us-cdbr-iron-east-05.cleardb.net';
    private $dbname = 'heroku_cd5eb9845f16f7b';
    private $username = 'bc54302f840a97';
    private $password = '0f8ef0e2';

//    private $logger;

    public function __construct()
    {
//        $this->logger = new KLogger ("log.txt", KLogger::DEBUG);
    }

    public function getConnection()
    {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            return $connection;
        } catch (Exception $e) {
            echo print_r($e, 1);
        }

    }
    public function getUser($user_name, $password){
        $connection= $this->getConnection();
        $query = $connection->prepare("SELECT * FROM user WHERE user_name=:user_name AND password=:password");
        $query->bindParam(':user_name', $user_name);
        $query->bindParam(':password', $password);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $results = $query-> fetchColumn();
        echo $results;
        return $results;
    }
    public function addUser($first_name, $last_name, $email, $username, $password){
        $connection = $this->getConnection();
        $query = $connection->prepare("INSERT INTO user (first_name, last_name, user_name, email, password) VALUES (:first_name, :last_name, :user_name, :email, :password)");
        $query->bindParam(':first_name', $first_name);
        $query->bindParam(':last_name', $last_name);
        $query->bindParam(':user_name', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
    }

}
