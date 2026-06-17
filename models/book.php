<?php
require_once 'database.php';

class Book {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getTotal() {
        $sql = "SELECT count(id) as total FROM books";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }

    public function getAll($limit = null, $offset = null) {
        $sql = "SELECT books.*, categories.name as category_name, authors.name as author_name 
                FROM books 
                LEFT JOIN categories ON books.category_id = categories.id 
                LEFT JOIN authors ON books.author_id = authors.id 
                ORDER BY books.id DESC";

        if ($limit !== null && $offset !== null) {
            $sql .= " LIMIT :limit OFFSET :offset";
        }

        $stmt = $this->db->conn->prepare($sql);

        if ($limit !== null && $offset !== null) {
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM books WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addBook($title, $price, $description, $image, $category_id, $author_id) {
        $sql = "INSERT INTO books (title, price, description, image, category_id, author_id) 
                VALUES (:title, :price, :description, :image, :category_id, :author_id)";
        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute([
            ':title' => $title,
            ':price' => $price,
            ':description' => $description,
            ':image' => $image,
            ':category_id' => $category_id,
            ':author_id' => $author_id
        ]);
    }

    public function updateBook($id, $title, $price, $description, $image, $category_id, $author_id) {
        $sql = "UPDATE books SET title = :title, price = :price, description = :description, 
                image = :image, category_id = :category_id, author_id = :author_id 
                WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':price' => $price,
            ':description' => $description,
            ':image' => $image,
            ':category_id' => $category_id,
            ':author_id' => $author_id
        ]);
    }

    public function deleteBook($id) {
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAuthors() {
        $sql = "SELECT * FROM authors";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
