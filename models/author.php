<?php
require_once 'database.php';

class Author
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    // Lấy tất cả tác giả
    public function getAllAuthors()
    {
        $sql = "SELECT * FROM authors ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
