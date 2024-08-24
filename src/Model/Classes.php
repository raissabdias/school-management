<?php

namespace App\Model;

use App\Helper\Connection;

class Classes
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
                description,
                type
            FROM classes 
            WHERE status = 1
            ORDER BY name ASC
        ";
        $stmt = $this->connection->query($sql);

        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function get($id)
    {
        $sql = "SELECT 
                id,
                name,
                description,
                type
            FROM classes 
            WHERE status = 1
                AND id = ?
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function add($data)
    {
        $name = $data['name'];
        $description = $data['description'];
        $type = $data['type'];

        $stmt = $this->connection->prepare("INSERT INTO classes(name, description, type) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $description, $type);

        if ($stmt->execute()) {
            $id = $stmt->insert_id;
            return $id;
        }

        return false;
    }
    
    public function edit($id, $data)
    {
        $name = $data['name'];
        $description = $data['description'];
        $type = $data['type'];

        $stmt = $this->connection->prepare("UPDATE classes SET
            name = ?,
            description = ?,
            type = ?
            WHERE id = ?
        ");
        $stmt->bind_param('sssi', $name, $description, $type, $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function changeStatus($id, $status = 0)
    {
        $stmt = $this->connection->prepare("UPDATE classes SET status = ? WHERE id = ?");
        $stmt->bind_param('ii', $status, $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}