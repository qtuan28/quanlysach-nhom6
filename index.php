<?php
session_start();

$area = isset($_GET['area']) ? $_GET['area'] : 'user';
$act = isset($_GET['act']) ? $_GET['act'] : '/';

if ($area === 'admin') {
    require_once './controllers/BookController.php';
    $controller = new BookController();
    
    switch ($act) {
        case '/':
            $controller->index();
            break;
        case 'create':
            $controller->taoform();
            break;
        case 'store':
            $controller->store();
            break;
        case 'edit':
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $controller->edit($id);
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $controller->destroy($id);
            break;
        default:
            $controller->index();
            break;
    }
} else {
    require_once './controllers/ProductController.php';
    $controller = new ProductController();
    
    switch ($act) {
        case 'chitiet':
            $controller->detail();
            break;
        case 'add_cart':
            $controller->addCart();
            break;
        case '/':
        default:
            $controller->index();
            break;
    }
}
?>