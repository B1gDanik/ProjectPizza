<?php
ob_start();
?>

    <div class="col-sx-9">
        <h4 class="box-title">Редактировать новость</h4>
        <p>News update date: <?php echo date("d-m-Y") ?></p>

        <?php
        if (isset($result)) {
            if ($result) {
                ?>
                <div class="alert alert-info">
                    <strong>Запись изменена. </strong>
                    <a href="newsAction">Список новостей</a>
                </div>
            <?php } elseif ($result == false) { ?>
                <div class="alert alert-warning">
                    <strong>Ошибка изменения записи! </strong>
                    <a href="newsAction">Список новостей</a>
                </div>
            <?php }
        } else { ?>
            <form action="editNewsResult?id=<?php echo $item['id'] ?>" method="POST"
                  enctype="multipart/form-data">
                <label for="title">Name *</label>
                <input id="title" type="text" name="title" placeholder="title" class="form-control"
                       value="<?php echo $item['title'] ?>" required>

                <label for="text">News text *</label>
                <textarea name="text" id="text" placeholder="News text" class="form-control"
                          required><?php echo $item['text'] ?></textarea>

                <label for="oldPhoto">Old Photo</label>
                <input id="oldPhoto" type="text" name="oldpicture" placeholder="Old picture" class="form-control"
                       value="<?php echo $item['picture'] ?>" readonly>
                <img src="../public/images/<?php echo $item['picture'] ?>" alt="" class="thumbnail" width="150px">

                <label for="photo">
                    Photo <i>(если необходимо, сделайте выбор нового фото)</i>
                </label>
                <input id="photo" type="file" name="picture" class="form-control">

                <input type="submit" class="btn btn-success" value="Edit news" name="save">
            </form>
        <?php } ?>
    </div>

<?php
$content = ob_get_clean();
include 'viewAdmin/templates/layout.php';


