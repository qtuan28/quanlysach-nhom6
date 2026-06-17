<?php
require_once 'database.php';

class Sanpham {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll($keyword = '') {
        $sql = "SELECT b.id, b.title as tenSP, b.price as gia, b.image as img, a.name as tacgia, b.description as mo_ta, 10 as sl 
                FROM books b 
                LEFT JOIN authors a ON b.author_id = a.id 
                WHERE 1=1";
        
        if (!empty($keyword)) {
            $sql .= " AND b.title LIKE :keyword";
        }
        
        $sql .= " ORDER BY b.id DESC";

        $stmt = $this->db->conn->prepare($sql);
        
        if (!empty($keyword)) {
            $stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
        }
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return []; 
        }
    }
    public function getById($id) {
        $sql = "SELECT b.id, b.title as tenSP, b.price as gia, b.image as img, a.name as tacgia, b.description as mo_ta, 10 as sl 
                FROM books b 
                LEFT JOIN authors a ON b.author_id = a.id 
                WHERE b.id = :id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
    }
}
?>
