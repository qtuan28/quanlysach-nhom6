<?php
require_once 'models/author.php';

class AuthorController
{
    private $author;

    public function __construct()
    {
        $this->author = new Author();
    }

    public function index()
    {
        $authors = $this->author->getAllAuthors();

        include 'views/admin/author_index.php';
    }

    // Thêm tác giả
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $bio = isset($_POST['bio']) ? trim($_POST['bio']) : '';

            if (!empty($name)) {
                $this->author->addAuthor($name, $bio);
                header("Location: ?area=author");
                exit();
            }
        }

        include 'views/admin/add_author.php';
    }

    // Sửa tác giả
    public function edit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $bio = isset($_POST['bio']) ? trim($_POST['bio']) : '';

            if (!empty($name)) {
                $this->author->updateAuthor($id, $name, $bio);
                header("Location: ?area=author");
                exit();
            }
        }

        $author = $this->author->getAuthorById($id);
        if (!$author) {
            header("Location: ?area=author");
            exit();
        }

        include 'views/admin/edit_author.php';
    }

    // Xóa tác giả
    public function delete()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if ($id > 0) {
            $this->author->deleteAuthor($id);
        }

        header("Location: ?area=author");
        exit();
    }
}
