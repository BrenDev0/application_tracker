<?php
require_once './private/config/Database.php';

class Application {
    private $conn;
    
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->__connect();
    }

}