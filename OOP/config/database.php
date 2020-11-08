<?php

class Database{
    //Parms
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    //private $db_name = 'github_repositories';
    private $db_name = 'repoTest';
    private $conn;

    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=$this->host", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'CREATE DATABASE IF NOT EXISTS repoTest';
            $this->conn->exec($sql);
            $sql = "use repoTest";
            $this->conn->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS repos (
                         ID int(11) PRIMARY KEY NOT NULL,
                         name varchar(255) NOT NULL,
                         URL varchar(255) NOT NULL,
                         created_date date  NOT NULL,
                         last_push_date date  NOT NULL,
                         description text  NOT NULL,
                         number_stars INT(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $this->conn->exec($sql);
           

        }catch(PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}