<?php

namespace App\Helper;

use mysqli;

class Connection 
{
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '0666';
    private $db_name = 'school_management';
    private $conn;

    public function __construct() 
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function close() 
    {
        $this->conn->close();
    }
}