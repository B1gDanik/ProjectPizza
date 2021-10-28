<?php 
    ob_start();
    $titel="Состав пиццы ";
?>
<?php 
echo '<div class="productDetail">';
    echo '<img src="public/images/'.$product['photo']. '" class="imgStyle">';
    echo '<h3>'.$product['name']. '</h3>';
    echo '<p><b>Ингредиенты: </b>'.$product['description'].'</p>';
    echo '<p><b>Категория: </b>'. $product['category'].'</p>';
    echo '<p><b>Цена: </b>'.$product['price'].'</p>';
    echo '<div><br>';
        echo '<a href="product?id='.$product['idCategory'].'">К списку по категориям &#187 </a>';
        echo '<span class="a"><a href="cart?id='.$product['id'].'">Заказать &#187 </a></span>';
    echo '</div>';
echo '</div>';
?>
<?php 
    $content = ob_get_clean();
    include "view/templates/layout.php";
?>