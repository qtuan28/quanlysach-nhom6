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

    // Lấy 1 tác giả theo id
    public function getAuthorById($id)
    {
        $sql = "SELECT * FROM authors WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm tác giả
    public function addAuthor($name, $bio)
    {
        $sql = "INSERT INTO authors(name, bio) VALUES(:name, :bio)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':bio', $bio, PDO::PARAM_STR);

        return $stmt->execute();
    }

    // Sửa tác giả
    public function updateAuthor($id, $name, $bio)
    {
        $sql = "UPDATE authors SET name = :name, bio = :bio WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':bio', $bio, PDO::PARAM_STR);

        return $stmt->execute();
    }

    // Xóa tác giả
    public function deleteAuthor($id)
    {
        $sql = "DELETE FROM authors WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
