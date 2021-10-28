<?php 
    ob_start();
    $titel="Моя корзина";
?>
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <h4><span class="glyphicon glyphicon-shopping-cart"></span>
                                Товаров в корзине: <?php echo modelCart::countItems(); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>



<?php 
if(isset($_SESSION['products']) && count($_SESSION['products']) > 0) {
    foreach ($productList as $row) {
        echo '<div class="panel-body">';
        echo '<div class="row">';
            echo '<div class="col-xs-2">';
                echo '<img class="img-responsive" witdh="150px" src="public/images/' .$row['photo']. '">';
            echo '</div>';
            echo '<div class="col-xs-4"><h5 class="product-name">'.$row['name'].'</h5></div>';
            echo '<div class="col-xs-6">';
                echo '<div class="col-xs-6 text-right">';
                echo '<h4>Цена:'.$row['price'].' €</h4>';
                echo '</div>';
                echo '<div class="col-xs-4">';
                    echo '<input type="text" class="form-control input-sm" readonly="readonly" value="';
                        echo $productsInCart[$row['id']];
                    echo '">';
                echo '</div>';
                echo '<div class="col-xs-2">';
                    echo '<a href="cartProductDel?id=' .$row['id']. '">';
                        echo '<button type="button" class="btn btn-link btn-xs">';
                            echo '<span class="glyphicon glyphicon-trash"> </span>';
                        echo '</button>';
                    echo '</a>';
                    // ADD BUTTON
                    echo '<a href="cartProductAdd?id='. $row['id']. '">';
                        echo '<button type="button" class="btn btn-link btn-xs">';
                            echo '<span class="glyphicon glyphicon-plus"></span>';
                        echo '</button>';
                    echo '</a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
    echo '<hr>';
    } 
}

else {
        echo '<br>';
        echo '<h4 class="text-center">Корзина пуста</h4>';
        echo '<br>';
}
?>
    <div class="row" style="padding: 15px;">
        <div class="text-center">
            <div class="col-xs-9"></div>
            <div class="col-xs-3">
                <?php
                    if (isset($_SESSION['products'])){
                ?>
                    <button type="button" class="btn btn-primary btn-block"
                    onclick="location.href= 'clearCart';">Clear Cart</button>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
<?php 
    if(isset($_SESSION['products']) && count($_SESSION['products']) > 0){
?>

    <div class="panel-footer">
        <div class="row text-center">
            <div class="col-xs-9">
                <h4 class="text-right">Total <?php echo number_format($totalSum, 2, '.', '')?><strong> &euro;</strong></h4>
            </div>
            <div class="col-xs-3">
                <span data-toggle="modal" data-target="#myModal">
                    <button type="button" class="btn btn-success btn-block">
                        Перейти к оплате
                    </button>
                </span>
            </div>
        </div>
    </div>
<?php 
    }
?>
        </div>
    </div>
</div>
<?php 
    $content = ob_get_clean();
    include_once "view/templates/layout.php";
?>

<!--- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Оформить покупку</h4>
			</div>
			<div class="modal-body">
				<h4>
				Заказ от <?php echo date('d-m-Y'); ?>
				</h4>
					<form method='POST' action='sendOrder' id="myForm">
						<input class="form-control" type="text" name="clientName" placeholder="Введите ваше имя" autofocus=""
						required><br>
						<input class="form-control" type="text" name="aadress" placeholder="Введите ваш адрес"required><br>
						<input class="form-control" type="text" name="phone" placeholder="Введите ваш телефон"required><br>
						<input class="form-control" type="text" name="email" placeholder="Введите ваш э-майл" required><br>
						<button type="submit" value="Submit" name="send" id="submit" class="btn btn-default btn-block">
						Отправить</button>
					</form>

					
					<p class="text-danger">Общая сумма заказа: <?php echo number_format($totalSum, 2,'.','')?> &euro;</p>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end modal-->