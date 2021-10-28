<?php
	ob_start();
	$titel="Ваш заказ";
?>
	<div class="center" style="height:500px;">
	<?php
		if (isset($sendResult) && $sendResult == True) {
			echo '<h2>Ваш заказ принят!</h2>';
		} else {
			echo '<h3>Сообщение об ошибке</h3>';
			echo '<p><b>Заполните корректно форму заказа</b></p>';	
		}
		echo '<div><br>';
			echo '<a href="product">К списку продукции &#187 </a>';
		echo '</div>';
	?>
</div>

<?php
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>