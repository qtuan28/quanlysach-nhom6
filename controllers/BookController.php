<?php
require_once './models/sanpham.php';

class BookController {
    public function index() {
        $model = new Sanpham();
        $rawBooks = $model->getAll();
        
        $books = [];
        foreach ($rawBooks as $sp) {
            $books[] = [
                'id' => $sp['id'],
                'title' => $sp['tenSP'],
                'price' => $sp['gia'],
                'author_name' => isset($sp['tacgia']) ? $sp['tacgia'] : 'Chưa cập nhật',
                'category_name' => 'Sách' 
            ];
        }
        
        require './views/admin/book_index.php';
    }
}
?>
