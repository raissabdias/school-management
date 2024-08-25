<?php

namespace App\Model;

use App\Helper\Connection;

class Users
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new Connection();
        $this->connection = $this->db->getConn();
    }

    public function login($data)
    {
        $email = $data['email'];
        $password = md5($data['password']);

        $sql = "SELECT 
                id,
                name
            FROM users 
            WHERE status = 1
                AND email = ?
                    AND password = ?
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();

        if ($result) {
            return $result;
        }

        return false;
    }
}