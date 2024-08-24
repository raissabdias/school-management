<?php

namespace App\Model;

use App\Helper\Connection;

class Enrollments
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
                enrollments.id,
                student_id,
                students.name AS student_name,
                class_id,
                classes.name AS class_name,
                DATE_FORMAT(enrollments.created_at, '%d/%m/%Y') AS date
            FROM enrollments 
            INNER JOIN students ON student_id = students.id
            INNER JOIN classes ON class_id = classes.id
            WHERE enrollments.status = 1
        ";
        $stmt = $this->connection->query($sql);

        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function checkEnrollment($student_id, $class_id, $id)
    {
        $sql = "SELECT 
                id
            FROM enrollments 
            WHERE status = 1
                AND student_id = ?
                    AND class_id = ?
        ";

        if ($id) {
            $sql .= " AND id != ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('iii', $student_id, $class_id, $id);
        } else {
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('ii', $student_id, $class_id);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function get($id)
    {
        $sql = "SELECT 
                student_id,
                class_id
            FROM enrollments 
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
        $student = $data['student_id'];
        $class = $data['class_id'];

        $stmt = $this->connection->prepare("INSERT INTO enrollments(student_id, class_id) VALUES (?, ?)");
        $stmt->bind_param('ii', $student, $class);

        if ($stmt->execute()) {
            $id = $stmt->insert_id;
            return $id;
        }

        return false;
    }
    
    public function edit($id, $data)
    {
        $student = $data['student_id'];
        $class = $data['class_id'];

        $stmt = $this->connection->prepare("UPDATE enrollments SET
            student_id = ?,
            class_id = ?
            WHERE id = ?
        ");
        $stmt->bind_param('iii', $student, $class, $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function changeStatus($id, $status = 0)
    {
        $stmt = $this->connection->prepare("UPDATE enrollments SET status = ? WHERE id = ?");
        $stmt->bind_param('ii', $status, $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}