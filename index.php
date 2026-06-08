<?php
session_start();
require_once './controllers/ProductController.php';

$controller = new ProductController();
$controller->index();
?>