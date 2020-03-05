<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>

    <h2 style="margin: 20px;text-align: center;">List Type</h2>
  
        <div class="md-form mt-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="tableSearch"
                style="width: 25%; float: right; margin: 15px;">
        </div>
        <br>  
        <div class="container" id="container">
        <a href="type.view.php?page=add" class="btn btn-success btn-sm" style="float:left">ADD</a>
        <a href="type.view.php?page=show_backup" class="btn btn-warning btn-sm" style="float:right">Backup File</a>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name_Type</th>
                    <th>Image</th>
                    <th  colspan="2" style="text-align : center">Action</th>
                </tr>
            </thead>
            <br>
            <tbody id="myTable">
                <?php foreach ($types as $key => $type): ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $type->name_type ?></td>
                    <td><img src="<?= 'data:image;base64,'.base64_encode($type->image)?> " width="60px" height="60px">
                    </td>
                    <td> <a href="type.view.php?page=edit&id=<?php echo $type->id; ?>"
                            class="btn btn-info btn-sm">Update</a></td>
                    <td> <a href="type.view.php?page=delete&id=<?php echo $type->id; ?>"
                            class="btn btn-warning btn-sm">Delete</a></td>
                    <?php endforeach; ?>
            </tbody>
        </table>
        </body>
    </div>
</head>

</html>