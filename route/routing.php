<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

if ($path == '' or $path == 'home' or $path == 'index') {
    Controller::StartSite();
} elseif ($path == 'product') {
    Controller::ProductList();
} elseif ($path == 'category' && isset($_GET['id'])) {
    Controller::ProductByCategory($_GET['id']);
} elseif ($path == 'productDetail' && isset($_GET['id'])) {
    Controller::ProductById($_GET['id']);
} elseif ($path == 'news') {
    Controller::NewsList();
} elseif ($path == 'newsDetail' && isset($_GET['id'])) {
    Controller::NewsById($_GET['id']);
} elseif ($path == 'cart' && isset($_GET['id'])) {
    controllerCart::cartActionAdd($_GET['id']);
} elseif ($path == 'cartList') {
    controllerCart::cartList();
} elseif ($path == 'cartProductDel' && isset($_GET['id'])) {
    controllerCart::cartProductDelete($_GET['id']);
} elseif ($path == 'cartProductAdd' && isset($_GET['id'])) {
    controllerCart::cartProductAdd($_GET['id']);
} elseif ($path == 'clearCart') {
    controllerCart::cartClear();
} elseif ($path == 'sendOrder') {
    controllerCart::orderSend();
} else {
    Controller::error404();
}
?>
