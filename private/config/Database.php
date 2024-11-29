<?php

class Database {
    public $conn;
    private string $host = 'localhost';
    private string $db_name = 'application_tracker';
    private string $user = 'root';
    private string $password = '';
    private string $dsn = "mysql:host=$this->host;dbname=$this->db_name";

    public function __construct()
    {
        try{
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch(PDOException $e){
            'Connection Failed: ' . $e->getMessage();
        }

        return $this->conn;
    }
}