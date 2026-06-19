<?php
require_once './models/sanpham.php';

class ProductController {
    public function addCart() {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        if ($id > 0) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]++;
            } else {
                $_SESSION['cart'][$id] = 1;
            }
        }
    
        // Quay về trang chủ
        header("Location: index.php");
        exit();
    }

    public function index() {
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;
        $author_id = isset($_GET['author_id']) ? (int)$_GET['author_id'] : 0;
        $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 0;

        $model = new Sanpham();
        
        // Fetch categories and authors for filter dropdowns
        $categories = $model->getAllCategories();
        $authors = $model->getAllAuthors();

        // Fetch filtered products
        $sp = $model->getAll($keyword, $category_id, $author_id, $min_price, $max_price);   
        
        $cartCount = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $qty) {
                $cartCount += $qty;
            }
        }

        require './views/dssp.php';
    }
    public function detail() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id <= 0) {
            header("Location: index.php");
            exit();
        }
        
        $model = new Sanpham();
        $sp = $model->getById($id);
        
        if (!$sp) {
            header("Location: index.php");
            exit();
        }
        
        $cartCount = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $qty) {
                $cartCount += $qty;
            }
        }
        
        require './views/chitiet.php';
    }
}
?>
