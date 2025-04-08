<?php
class Queries {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function displayAllStudents() {
        $query = "SELECT id, _name as name, date(birthday) as birthday FROM student";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getStudentById($id) {
        try {
            $query = "SELECT id, _name as name, date(birthday) as birthday FROM student WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Query error: " . $e->getMessage());
            return false;
        }
    }
}