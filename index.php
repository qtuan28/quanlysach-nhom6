<?php
session_start();

$area = isset($_GET['area']) ? $_GET['area'] : 'user';
$defaultController = ($area == 'admin') ? 'book' : 'product';
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : $defaultController;

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($area) {
    case 'admin':
        switch ($controllerName) {
            case 'book':
                require_once './controllers/admin/BookController.php';
                $controller = new BookController();
                switch ($action) {
                    case 'index':
                    default:
                        $controller->index();
                        break;
                }
                break;
        }
        break;

    case 'user':
    default:
        require_once './controllers/ProductController.php';
        $controller = new ProductController();
        
        switch ($action) {
            case 'detail':
                $controller->detail();
                break;
            case 'index':
            default:
                $controller->index();
                break;
        }
        break;
}
?>