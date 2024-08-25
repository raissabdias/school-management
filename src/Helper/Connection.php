<?php

namespace App\Helper;

use mysqli;
use Dotenv\Dotenv;

class Connection 
{
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '0666';
    private $db_name = 'school_management';
    private $conn;

    public function __construct() 
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); 
        $dotenv->load();

        $this->host = $_ENV['HOST'];
        $this->username = $_ENV['USERNAME'];
        $this->password = $_ENV['PASSWORD'];
        $this->db_name = $_ENV['DB_NAME'];

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