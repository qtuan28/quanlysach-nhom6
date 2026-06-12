<?php
session_start();

$area = isset($_GET['area']) ? $_GET['area'] : 'user';
$defaultController = ($area == 'admin') ? 'book' : 'product';
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : $defaultController;

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($area == 'admin') {
    if ($controllerName == 'book') {
        require_once './controllers/admin/BookController.php';
        $controller = new BookController();
        if ($action == 'index') {
            $controller->index();
        }
    }
} else {
    require_once './controllers/ProductController.php';
    $controller = new ProductController();
    
    if ($action == 'detail') {
        $controller->detail();
    } else {
        $controller->index();
    }
}
?>