<?php
require_once 'database.php';

class Sanpham {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll($keyword = '') {
        $sql = "SELECT * FROM CH WHERE 1=1";
        
        if (!empty($keyword)) {
            $sql .= " AND tenSP LIKE :keyword";
        }
        
        $sql .= " ORDER BY id DESC";

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
        $sql = "SELECT * FROM CH WHERE id = :id";
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
