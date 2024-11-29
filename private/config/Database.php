<?php

class Database {
    private $conn;
    private string $host = 'localhost';
    private string $db_name = 'application_tracker';
    private string $user = 'root';
    private string $password = '';

    public function __connect()
    {
        try{
            $dsn = "mysql:host=$this->host;dbname=$this->db_name";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch(PDOException $e){
            'Connection Failed: ' . $e->getMessage();
        }

        return $this->conn;
    }
}