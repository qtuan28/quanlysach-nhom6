<?php
require_once 'models/category.php';

class CategoryController
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    // Danh sách thể loại
    public function index()
    {
        $categories = $this->category->getAllCategory();

        include 'views/admin/category_index.php';
    }

    // Thêm thể loại
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = trim($_POST['name']);

            if (!empty($name)) {

                $this->category->addCategory($name);

                header("Location: ?area=category");
                exit();
            }
        }

        include 'views/admin/add_category.php';
    }

    // Sửa thể loại
    public function edit()
    {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = trim($_POST['name']);

            $this->category->updateCategory($id, $name);

            header("Location: ?area=category");
            exit();
        }

        $category = $this->category->getCategoryById($id);

        include 'views/admin/edit_category.php';
    }

    // Xóa thể loại
    public function delete()
    {
        $id = $_GET['id'];

        $this->category->deleteCategory($id);

        header("Location: ?area=category");
        exit();
    }
}