<?php
ob_start();
?>

    <h4 class="box-title">Product Action List</h4>
    <button class="btn btn-success btn-sm">
        <a href="addProduct" style="color: white">add product</a>
    </button>

    <table class="table">
        <thead>
        <tr class="d-flex">
            <th style="width: 5%">#</th>
            <th style="width: 25%">Name</th>
            <th style="width: 20%">Category</th>
            <th style="width: 20%">Price</th>
            <th style="width: 20%">Photo</th>
            <th style="width: 10%">Action</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['category'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td>
                    <img src="../public/images/<?php echo $row['photo'] ?>" alt="" style="width: 100px">
                </td>
                <td>
                    <a class="btn btn-warning btn-sm btn-block" href="editProduct?id=<?php echo $row['id'] ?>"
                       style="color: white">edit</a>

                    <a class="btn btn-danger btn-sm btn-block" href="deleteProduct?id=<?php echo $row['id'] ?>"
                       style="color: white">delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="4"></td>
            <td><b>Всего наименований:</b></td>
            <td><b><?php echo count($rows) ?></b></td>
        </tr>
        </tfoot>
    </table>

<?php
$content = ob_get_clean();
include 'viewAdmin/templates/layout.php';


