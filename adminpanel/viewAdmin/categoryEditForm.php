<?php
ob_start();
?>

    <div class="col-sx-9">
        <h4 class="box-title">Редактировать категорию</h4>
        <p>Category update date: <?php echo date("d-m-Y") ?></p>

        <?php
        if (isset($result)) {
            if ($result) {
                ?>
                <div class="alert alert-info">
                    <strong>Запись изменена. </strong>
                    <a href="categoryAction">Список категорий</a>
                </div>
            <?php } elseif ($result == false) { ?>
                <div class="alert alert-warning">
                    <strong>Ошибка изменения записи! </strong>
                    <a href="categoryAction">Список категорий</a>
                </div>
            <?php }
        } else { ?>
            <form action="editCategoryResult?id=<?php echo $category['id'] ?>" method="POST"
                  enctype="multipart/form-data">
                <label for="category">Name *</label>
                <input id="category" type="text" name="category" placeholder="Name" class="form-control"
                       value="<?php echo $category['category'] ?>" required>

                <input type="submit" class="btn btn-success" value="Edit category" name="save">
            </form>
        <?php } ?>
    </div>

<?php
$content = ob_get_clean();
include 'viewAdmin/templates/layout.php';


