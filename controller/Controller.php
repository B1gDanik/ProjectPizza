<?php
class Controller {
    public static function StartSite() {
        include_once('view/homepage.php');
        return;
    }

    public static function error404() {
        include_once('view/error404.php');
        return;
    }

    public static function ProductList() {
        $categories = Model::getCategoryList();
        $productList = Model::getProductList();
        include_once('view/productList.php');
        return;
    }
    //продукт по категориям
    public static function ProductByCategory($id) {
        $categories = Model::getCategoryList(); //список категорий
        $category = Model::getCategoryById($id);

        $productList = Model::getProductByCategory($id);
        include_once('view/productList.php');
        return;
    }
    //----- один продукт
    // -------- детальная запись ид продукта получаем из роута
    public static function ProductById($id)
    {
        $categories = Model::getCategoryList();
        $product = Model::getProductById($id);
        include_once('view/productDetail.php');
        return;
    }
	
	    public static function NewsList() {

        $news = Model::getNewsList();
        include_once('view/news.php');
        return;
    }

    public static function NewsById($id)
    {
        $news = Model::getNewsById($id);
        include_once('view/newsDetail.php');
        return;
    }



}
?>