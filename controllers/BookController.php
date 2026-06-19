<?php
require_once './models/book.php';

class BookController {
    public function index() {
        $model = new Book();
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 5; // Số sách trên mỗi trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $limit;
        
        $total_records = $model->getTotal($keyword);
        $total_pages = ceil($total_records / $limit); 
        $books = $model->getAll($limit, $offset, $keyword);
        
        require './views/admin/book_index.php';
    }

    public function taoform() {
        $model = new Book();
        $categories = $model->getAllCategories();
        $authors = $model->getAllAuthors();
        require_once 'views/admin/add_book.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $price = (float)str_replace(['.', ','], '', $_POST['price']);
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $author_id = $_POST['author_id'];
            
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = 'uploads/' . basename($_FILES['image']['name']);
                if (!is_dir('uploads')) {
                    mkdir('uploads', 0777, true);
                }
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            }

            $model = new Book();
            $model->addBook($title, $price, $description, $image, $category_id, $author_id);
            header("Location: index.php?area=admin");
            exit;
        }
    }

    public function edit($id) {
        $model = new Book();
        $book = $model->getById($id);
        $categories = $model->getAllCategories();
        $authors = $model->getAllAuthors();
        require_once 'views/admin/edit_book.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $price = (float)str_replace(['.', ','], '', $_POST['price']);
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $author_id = $_POST['author_id'];
            
            $model = new Book();
            $book_old = $model->getById($id);
            $image = $book_old['image']; // Mặc định giữ ảnh cũ
            
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = 'uploads/' . basename($_FILES['image']['name']);
                if (!is_dir('uploads')) {
                    mkdir('uploads', 0777, true);
                }
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            }

            $model->updateBook($id, $title, $price, $description, $image, $category_id, $author_id);
            header("Location: index.php?area=admin");
            exit;
        }
    }

    public function destroy($id) {
        $model = new Book();
        $model->deleteBook($id);
        header("Location: index.php?area=admin");
        exit;
    }
}
?>
