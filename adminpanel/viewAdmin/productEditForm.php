<?php
ob_start();
?>

    <div class="col-sx-9">
        <h4 class="box-title">Редактировать товар</h4>
        <p>Product update date: <?php echo date("d-m-Y") ?></p>

        <?php
        if (isset($result)) {
            if ($result) {
                ?>
                <div class="alert alert-info">
                    <strong>Запись изменена. </strong>
                    <a href="productAction">Список продукции</a>
                </div>
            <?php } elseif ($result == false) { ?>
                <div class="alert alert-warning">
                    <strong>Ошибка изменения записи! </strong>
                    <a href="productAction">Список продукции</a>
                </div>
            <?php }
        } else { ?>
            <form action="editProductResult?id=<?php echo $product['id'] ?>" method="POST"
                  enctype="multipart/form-data">
                <label for="name">Name *</label>
                <input id="name" type="text" name="name" placeholder="Name" class="form-control"
                       value="<?php echo $product['name'] ?>" required>

                <label for="category">Category *</label>
                <select name="category" id="category" class="form-control">
                    <?php foreach ($rowsCategory as $category) { ?>
                        <option value="<?php echo $category['id'] ?> <?php if ($category['id'] == $product['idCategory']) echo 'selected' ?>">
                            <?php echo $category['category'] ?>
                        </option>
                    <?php } ?>
                </select>

                <label for="price">Price *</label>
                <input id="price" type="text" name="price" placeholder="Price" class="form-control"
                       value="<?php echo $product['price'] ?>" required>

                <label for="oldPhoto">Old Photo</label>
                <input id="oldPhoto" type="text" name="oldpicture" placeholder="Old picture" class="form-control"
                       value="<?php echo $product['photo'] ?>" readonly>
                <img src="../public/images/<?php echo $product['photo'] ?>" alt="" class="thumbnail" width="150px">

                <label for="photo">
                    Photo
                    <i>(если необходимо, сделайте выбор нового фото)</i>
                </label>
                <input id="photo" type="file" name="picture" class="form-control">

                <label for="text">Pizza text *</label>
                <textarea name="description" id="text" placeholder="Pizza text" class="form-control"
                          required><?php echo $product['description'] ?></textarea>

                <input type="submit" class="btn btn-success" value="Edit product" name="save">
            </form>
        <?php } ?>
    </div>

<?php
$content = ob_get_clean();
include 'viewAdmin/templates/layout.php';


