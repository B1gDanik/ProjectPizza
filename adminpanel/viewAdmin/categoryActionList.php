<?php
ob_start();
?>

    <h4 class="box-title">Category Action List</h4>
    <a class="btn btn-success btn-sm" href="addCategory" style="color: white">add category</a>

    <table class="table">
        <thead>
        <tr class="d-flex">
            <th>#</th>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['category'] ?></td>
                <td style="width: 7%">
                    <a class="btn btn-warning btn-sm btn-block" href="editCategory?id=<?php echo $row['id'] ?>"
                       style="color: white">edit</a>

                    <a class="btn btn-danger btn-sm btn-block" href="deleteCategory?id=<?php echo $row['id'] ?>"
                       style="color: white">delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>

        <tfoot>
        <tr>
            <td></td>
            <td><b>Всего наименований: <?php echo count($rows) ?></b></td>
        </tr>
        </tfoot>
    </table>

<?php
$content = ob_get_clean();
include 'viewAdmin/templates/layout.php';


