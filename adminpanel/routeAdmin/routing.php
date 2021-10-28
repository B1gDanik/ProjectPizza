<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

if ($path == '' or $path == 'index.php' or $path == 'index') {
    ControllerAdmin::loginForm();
} elseif ($path == 'loginResult' or $path == 'dashboard') {
    ControllerAdmin::startAdmin();
} elseif ($path == 'logout') {
    ControllerAdmin::logoutAdmin();
} elseif ($path == 'productAction') {
    ControllerProduct::productList();
} elseif ($path == 'addProduct') {
    ControllerProduct::addProductForm();
} elseif ($path == 'addProductResult') {
    ControllerProduct::addProductResult();
} elseif ($path == 'editProduct' && isset($_GET['id'])) {
    ControllerProduct::editProductForm($_GET['id']);
} elseif ($path == 'editProductResult' && isset($_GET['id'])) {
    ControllerProduct::editProductResult($_GET['id']);
} elseif ($path == 'deleteProduct' && isset($_GET['id'])) {
    ControllerProduct::deleteProductForm($_GET['id']);
} elseif ($path == 'deleteProductResult' && isset($_GET['id'])) {
    ControllerProduct::deleteProductResult($_GET['id']);
} elseif ($path == 'profile') {
    ControllerAdmin::profileTable();
} elseif ($path == 'profileEditResult') {
    ControllerAdmin::profileEditResult();
} elseif ($path == 'categoryAction') {
    ControllerCategory::categoryList();
} elseif ($path == 'addCategory') {
    ControllerCategory::addCategoryForm();
} elseif ($path == 'addCategoryResult') {
    ControllerCategory::addCategoryResult();
} elseif ($path == 'editCategory' && isset($_GET['id'])) {
    ControllerCategory::editCategoryForm($_GET['id']);
} elseif ($path == 'editCategoryResult' && isset($_GET['id'])) {
    ControllerCategory::editCategoryResult($_GET['id']);
} elseif ($path == 'deleteCategory' && isset($_GET['id'])) {
    ControllerCategory::deleteCategoryForm($_GET['id']);
} elseif ($path == 'deleteCategoryResult' && isset($_GET['id'])) {
    ControllerCategory::deleteCategoryResult($_GET['id']);
} elseif ($path == 'newsAction') {
    ControllerNews::newsList();
} elseif ($path == 'addNews') {
    ControllerNews::addNewsForm();
} elseif ($path == 'addNewsResult') {
    ControllerNews::addNewsResult();
} elseif ($path == 'editNews' && isset($_GET['id'])) {
    ControllerNews::editNewsForm($_GET['id']);
} elseif ($path == 'editNewsResult' && isset($_GET['id'])) {
    ControllerNews::editNewsResult($_GET['id']);
} elseif ($path == 'deleteNews' && isset($_GET['id'])) {
    ControllerNews::deleteNewsForm($_GET['id']);
} elseif ($path == 'deleteNewsResult' && isset($_GET['id'])) {
    ControllerNews::deleteNewsResult($_GET['id']);
} else {
    ControllerAdmin::error404();
}




























