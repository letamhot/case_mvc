<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>

<body>
    <h2>List Product</h2>
    <div class="container" id="container">
        <a href="index.php?page=add" class="btn btn-success btn-sm" style="float:right">ADD</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Type_product</th>
                    <th>Producer</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th>Price_input</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pros as $key => $pro): ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $pro->name ?></td>
                    <td><?php echo $pro->type_product ?></td>
                    <td><?php echo $pro->producer ?></td>
                    <td><?php echo $pro->amount ?></td>
                    <td><img src="<?= 'data:image;base64,'.base64_encode($pro->image)?> " width="60px" height="60px"
                            alt="<?= $pro->name ?>" class="img-thumnail"></td>
                    <td><?php echo $pro->price_input ?></td>
                    <td> <a href="index.php?page=backupfile&id=<?php echo $pro->id; ?>"
                            class="btn btn-warning btn-sm">Backup File</a></td>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>