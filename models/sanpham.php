<?php
require_once 'database.php';

class Sanpham {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll($keyword = '', $category_id = 0, $author_id = 0, $min_price = 0, $max_price = 0, $limit = null, $offset = null) {
        $sql = "SELECT b.id, b.title as tenSP, b.price as gia, b.image as img, a.name as tacgia, b.description as mo_ta, 10 as sl 
                FROM books b 
                LEFT JOIN authors a ON b.author_id = a.id 
                WHERE 1=1";
        
        $params = [];

        if (!empty($keyword)) {
            $sql .= " AND (b.title LIKE :keyword OR a.name LIKE :keyword)";
            $params[':keyword'] = "%$keyword%";
        }

        if ($category_id > 0) {
            $sql .= " AND b.category_id = :category_id";
            $params[':category_id'] = $category_id;
        }

        if ($author_id > 0) {
            $sql .= " AND b.author_id = :author_id";
            $params[':author_id'] = $author_id;
        }

        if ($min_price > 0) {
            $sql .= " AND b.price >= :min_price";
            $params[':min_price'] = $min_price;
        }

        if ($max_price > 0) {
            $sql .= " AND b.price <= :max_price";
            $params[':max_price'] = $max_price;
        }
        
        $sql .= " ORDER BY b.id DESC";
        
        if ($limit !== null && $offset !== null) {
            $sql .= " LIMIT :limit OFFSET :offset";
        }

        $stmt = $this->db->conn->prepare($sql);
        
        foreach ($params as $key => $value) {
            if (is_int($value)) {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }

        if ($limit !== null && $offset !== null) {
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        }
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return []; 
        }
    }
    public function getTotal($keyword = '', $category_id = 0, $author_id = 0, $min_price = 0, $max_price = 0) {
        $sql = "SELECT count(b.id) as total 
                FROM books b 
                LEFT JOIN authors a ON b.author_id = a.id 
                WHERE 1=1";
        
        $params = [];

        if (!empty($keyword)) {
            $sql .= " AND (b.title LIKE :keyword OR a.name LIKE :keyword)";
            $params[':keyword'] = "%$keyword%";
        }

        if ($category_id > 0) {
            $sql .= " AND b.category_id = :category_id";
            $params[':category_id'] = $category_id;
        }

        if ($author_id > 0) {
            $sql .= " AND b.author_id = :author_id";
            $params[':author_id'] = $author_id;
        }

        if ($min_price > 0) {
            $sql .= " AND b.price >= :min_price";
            $params[':min_price'] = $min_price;
        }

        if ($max_price > 0) {
            $sql .= " AND b.price <= :max_price";
            $params[':max_price'] = $max_price;
        }
        
        $stmt = $this->db->conn->prepare($sql);
        
        foreach ($params as $key => $value) {
            if (is_int($value)) {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
        
        try {
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        } catch (Exception $e) {
            return 0; 
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

    public function getAllCategories() {
        $sql = "SELECT id, name FROM categories ORDER BY name ASC";
        $stmt = $this->db->conn->prepare($sql);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }

    public function getAllAuthors() {
        $sql = "SELECT id, name FROM authors ORDER BY name ASC";
        $stmt = $this->db->conn->prepare($sql);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }
}
?>
