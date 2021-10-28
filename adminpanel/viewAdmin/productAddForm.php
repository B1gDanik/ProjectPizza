<?php
ob_start();
?>

    <div class="col-xs-9">
    <h4 class="box-title">Добавить товар</h4>
    <p>Today: <?php echo date('d-m-Y') ?></p>

<?php
if (isset($result)) {
    if ($result == true) { ?>

        <div class="alert alert-info">
            <strong>Запись добавлена. <strong><a href="productAction">Список продукции</a></strong></strong>
        </div>

    <?php } elseif ($result == false) { ?>
        <div class="alert alert-warning">
            <strong>Ошибка добавления записи! </strong>
            <a href="productAction">Список продукции</a>
        </div>
    <?php }
} else { ?>

    <form action="addProductResult" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" class="form-control" required>

        <select name="category" class="form-control">
            <?php foreach ($rowsCategory as $category) { ?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
            <?php } ?>
        </select>

        <input type="text" name="price" placeholder="Price" class="form-control" required>
        <input type="file" name="picture" class="form-control" required>
        <textarea name="description" placeholder="Text description..." class="form-control" required></textarea>
        <input type="submit" class="btn btn-success" value="add product" name="save">
    </form>
    </div>
<?php } ?>

<?php
$content = ob_get_clean();
include 'viewAdmin/templates/layout.php';
