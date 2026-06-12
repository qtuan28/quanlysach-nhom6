<?php
session_start();
require_once './controllers/ProductController.php';

$controller = new ProductController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($action == 'detail') {
    $controller->detail();
} else {
    $controller->index();
}
?>