<?php
ob_start();
$titel = "Наша продукция";
if (isset($category['category'])) {
    $titel .= " - пицца " . $category['category'];
}

?>
    <div class="col-md-12">
        <h2 class="text-uppercase text-center">Наша продукция</h2>
        <hr>
    </div>
    <!-- список категорий -->
    <div class="col-md-12">
        <div class="line" style="margin-left: auto; margin-right: auto;text-align:center;">
            <ul class="text-center meny" style="margin: 0; padding: 0; vertical-align: center; display: inline-block;">
                <li class="meny">
                    <a href="product">All</a>
                </li>
                <?php foreach ($categories as $category) { ?>
                    <span> | </span>
                    <li class="meny">
                        <a href="category?id='<?php echo $category['id'] ?>'"><?php echo $category['category'] ?></a>
                    </li>
                <?php } ?>
            </ul>
            <hr>
        </div>
    </div>
<?php foreach ($productList as $product) { ?>
    <div class="col-md-4" style="margin-bottom: 35px; text-align:center; min-width: 300px; height: 35%; display: flex; flex-direction: column; justify-content: space-between; align-items: center">
        <div style="width: 150px; height: 150px; display: flex; justify-content: center">
            <img src="public/images/<?php echo $product['photo'] ?>" style="min-width: 100%; margin: auto">
        </div>
        <h4><?php echo $product['name'] ?></h4>
        <h5 style="margin: 0 0 10px 0"><a href="productDetail?id='<?php echo $product['id'] ?>'">Подробнее &#187</a></h5>
    </div>
<?php } ?>

    <div style="clear:both"></div>
    <div class="right">
        <h4><?php echo count($productList); ?></h4>
    </div>

<?php
$content = ob_get_clean();
include "view/templates/layout.php";
?>