<?php

namespace App\Model;

use App\Helper\Connection;
use PDO;

class Student
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new Connection();
        $this->connection = $this->db->getConn();
    }

    public function list()
    {
        $sql = "SELECT 
                id,
                name,
                DATE_FORMAT(birth_date, '%d/%m/%Y') AS birth_date,
                username
            FROM students 
            WHERE status = 1
        ";
        $stmt = $this->connection->query($sql);

        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function add($data)
    {
        $name = $data['name'];
        $birth_date = $data['birth_date'];
        $username = $data['username'];

        $stmt = $this->connection->prepare("INSERT INTO students(name, birth_date, username) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $birth_date, $username);

        if ($stmt->execute()) {
            $id = $stmt->insert_id;
            return $id;
        }

        return false;
    }
}