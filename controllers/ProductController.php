<?php
require_once './models/sanpham.php';

class ProductController {

    public function index() {
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;
        $author_id = isset($_GET['author_id']) ? (int)$_GET['author_id'] : 0;
        $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 0;

        // Pagination
        $limit = 12; // 12 sản phẩm mỗi trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $limit;

        $model = new Sanpham();
        
        // Fetch categories and authors for filter dropdowns
        $categories = $model->getAllCategories();
        $authors = $model->getAllAuthors();

        // Count total products for pagination
        $total_records = $model->getTotal($keyword, $category_id, $author_id, $min_price, $max_price);
        $total_pages = ceil($total_records / $limit);

        // Fetch filtered products
        $sp = $model->getAll($keyword, $category_id, $author_id, $min_price, $max_price, $limit, $offset);

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
        
        require './views/chitiet.php';
    }
}
?>
