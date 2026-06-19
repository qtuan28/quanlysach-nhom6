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
}
