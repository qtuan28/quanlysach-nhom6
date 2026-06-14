<?php
session_start();

$area = isset($_GET['area']) ? $_GET['area'] : 'user';
$act = isset($_GET['act']) ? $_GET['act'] : '/';

if ($area === 'admin') {
    require_once './controllers/BookController.php';
    $controller = new BookController();
    
    switch ($act) {
        case '/':
        default:
            $controller->index();
            break;
    }
} else {
    // Khu vực người dùng (user)
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