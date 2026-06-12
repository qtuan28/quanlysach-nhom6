<?php
require_once './models/sanpham.php';

class ProductController {
    public function index() {
        if (isset($_GET['action']) && $_GET['action'] == 'add_cart') {
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
        
            $redirectUrl = strtok($_SERVER["REQUEST_URI"], '?'); 
            $queryParams = [];
            if (isset($_GET['keyword'])) $queryParams['keyword'] = $_GET['keyword'];
            $queryString = http_build_query($queryParams);
            if (!empty($queryString)) {
                $redirectUrl .= '?' . $queryString;
            }
            header("Location: " . $redirectUrl);
            exit();
        }
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $model = new Sanpham();
        $sp = $model->getAll($keyword);   
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
