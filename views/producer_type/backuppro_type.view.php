<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>

<body>
    <h2>List Product_Type</h2>
    <div class="container" id="container">
    <a href="producer_type.view.php?page=add" class="btn btn-success btn-sm" style="float:right">ADD</a>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID_Producer</th>
                <th>Producer</th>
                <th>ID_Type_product</th>
                <th>Type_product</th>
                <th>Amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($protypes as $key => $protype): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $protype->id_producer?></td>
                <td><?php echo $protype->name_producer?></td>
                <td><?php echo $protype->id_type?></td>
                <td><?php echo $protype->name_type?></td>
                <td><?php echo $protype->amount ?></td>
                <td> <a href="producer_type.view.php?page=backuppro_typefile&id1=<?php echo $protype->id_producer; ?>&id2=<?php echo $protype->id_type; ?>"
                        class="btn btn-warning btn-sm">Backup File</a></td>
                <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>

</html>