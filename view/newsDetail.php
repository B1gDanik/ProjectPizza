<?php

ob_start();
$title = $news['title'];

?>

    <div class="col-md-12">
        <h2 class="text-uppercase text-center">Новости</h2>
        <hr>
    </div>
    <div class="nrow">
        <?php
        if ($news['id'] === $id) {
        ?>
        <div class="news_details__block">
            <img src="public/images/<?php echo $news['picture'] ?>">
            <h3><?php echo $news['title'] ?></h3>
            <p><?php echo $news['text'] ?></p>
            <a style="cursor: pointer; float: left; margin-bottom: 20px" onclick="window.history.back()" id="back">Назад &#187 </a>
            <?php } ?>
        </div>
    </div>


<?php
$content = ob_get_clean();
include 'view/templates/layout.php';
?>
<?php

