<?php
require_once 'database.php';

class Category
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    // Lấy tất cả thể loại
    public function getAllCategory()
    {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy 1 thể loại theo id
    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm thể loại
    public function addCategory($name)
    {
        $sql = "INSERT INTO categories(name)
                VALUES(:name)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':name', $name);

        return $stmt->execute();
    }

    // Sửa thể loại
    public function updateCategory($id, $name)
    {
        $sql = "UPDATE categories
                SET name = :name
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);

        return $stmt->execute();
    }

    // Xóa thể loại
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}