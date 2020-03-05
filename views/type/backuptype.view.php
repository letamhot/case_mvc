<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
</head>

<body>
    <h2>List Type</h2>
    <div class="container" id="container">
        <a href="type.view.php?page=add" class="btn btn-success btn-sm" style="float:right">ADD</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name_Type</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($types as $key => $type): ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $type->name_type ?></td>
                    <td><img src="<?= 'data:image;base64,'.base64_encode($type->image)?> " width="60px" height="60px"
                            alt="<?= $type->name_type ?>" class="img-thumnail"></td>
                    <td> <a href="type.view.php?page=backupfile&id=<?php echo $type->id; ?>"
                            class="btn btn-warning btn-sm">Backup File</a></td>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>