<?php
ob_start();
?>

    <h4 class="box-title">News Action List</h4>
    <button class="btn btn-success btn-sm">
        <a href="addNews" style="color: white">add news</a>
    </button>

    <table class="table">
        <thead class="d-flex">
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 25%">Title</th>
            <th style="width: 20%">Text</th>
            <th style="width: 20%">Picture</th>
            <th style="width: 20%">Date</th>
            <th style="width: 10%">User Id</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><a href="../newsDetail?id=<?php echo $row['id'] ?>">Просмотреть новость</a></td>
                <td>
                    <img src="../public/images/<?php echo $row['picture'] ?>" alt="" style="width: 100px">
                </td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['idUser'] ?>
                </td>
                <td>
                    <a class="btn btn-warning btn-sm btn-block" href="editNews?id=<?php echo $row['id'] ?>"
                       style="color: white">edit</a>

                    <a class="btn btn-danger btn-sm btn-block" href="deleteNews?id=<?php echo $row['id'] ?>"
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


