<?php
require_once 'database.php';

class Sanpham {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll($keyword = '', $sort = 'newest') {
        $sql = "SELECT * FROM CH WHERE 1=1";
        
        if (!empty($keyword)) {
            $sql .= " AND tenSP LIKE :keyword";
        }
        
        if ($sort == 'price_asc') {
            $sql .= " ORDER BY gia ASC";
        } elseif ($sort == 'price_desc') {
            $sql .= " ORDER BY gia DESC";
        } else {
            $sql .= " ORDER BY id DESC"; 
        }

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
}
?>
