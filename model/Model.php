<?php

class Model
{
    public static function getCategoryList()
    {
        $query = "SELECT * FROM category ORDER BY category.category ASC";
        $db = new Database();
        $item = $db->getAll($query);
        return $item;
    }

    public static function getProductList()
    {
        $sql = "SELECT * FROM `product` ORDER BY `product`.`name` ASC";
        $db = new Database();
        //$item массив данных
        $item = $db->getAll($sql);
        return $item;
    }

    //---------- одна категория - название
    public static function getCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE id=$id";
        $db = new Database();
        $item = $db->getOne($sql);
        return $item;
    }

    //---------- продукты по категориям
    public static function getProductByCategory($id)
    {
        $sql = "SELECT * FROM product WHERE idCategory=$id";
        $db = new Database();
        //результат - список продукци - массив из таблицы продукт
        $item = $db->getAll($sql);
        return $item;
    }

    //--------- один продукт
    public static function getProductbyId($id)
    {
        $sql = "SELECT product.*,category.category FROM product,category WHERE product.idCategory=category.id AND product.id = $id";
        $db = new Database();
        $item = $db->getOne($sql);
        return $item;

    }

    public static function getNewsList()
    {
        $sql = "SELECT news.*, user.username FROM news, user WHERE news.idUser=user.id ORDER
        BY `date` DESC ";// сортировка по дате убывания
        $db = new Database();
        //$item массив данных
        $item = $db->getAll($sql);
        return $item;
    }

    //---

    public static function getNewsbyId($id)
    {
        $sql = "SELECT news.*, user.username FROM news, user WHERE news.idUser=user.id and news.id =$id";
        $db = new Database();
        $item = $db->getOne($sql);
        return $item;
    }
}

?>