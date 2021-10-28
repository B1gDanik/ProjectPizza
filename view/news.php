<?php
ob_start();
$titel = "Новости";
?>

    <section class="templatemo-section ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-uppercase text-center">Новости</h2>
                    <hr>
                </div>
                <div class="nrow">
                    <?php foreach ($news as $newsList) { ?>
                        <div>

                            <a class="article first-article">
                                <figure class="article-image">
                                    <img src="public/images/<?php echo $newsList['picture'] ?>">
                                </figure>
                                <div class="article-body">
                                    <h2 class="article-title"
                                        style="color: white; margin-left: 10px; margin-right: 10px">
                                        <?php echo $newsList['title'] ?>
                                    </h2>
                                    <footer class="article-info">
                                        <h5>
                                            <a href="newsDetail?id=<?php echo $newsList['id'] ?>"> Подробнее &#187 </a>
                                        </h5>
                                    </footer>
                                </div>
                            </a>
                        </div>
                    <?php } ?>


                    <div style="clear:both;"></div>
                    <div class="right"><h4>Количество записей: <?php echo count($news); ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .article {

            width: 100%;
            display: flex;
            flex-direction: column;
            flex-basis: auto;
        }


        .article-body {
            display: flex;
            flex: 1;
            flex-direction: column;
        }

        .nested-column {
            flex: 2;
        }
        .article-content {
            flex: 1;
        }
    </style>


<?php
$content = ob_get_clean();
include_once("view/templates/layout.php");

