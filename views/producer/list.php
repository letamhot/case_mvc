<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <h2 style="margin: 20px;text-align: center;">Producer List</h2>
    <div class="md-form mt-0">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="tableSearch"
            style="width: 25%; float: right; margin: 15px;">
    </div>
    <br>
    <div class="container" id="container">
    <a href="producer.view.php?page=add" class="btn btn-success btn-sm" style="float:left">ADD</a>
    <a href="producer.view.php?page=show_backup" class="btn btn-warning btn-sm" style="float:right">Backup File</a>
    <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name_Producer</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Tax_Code</th>
                    <th>Image</th>
                    <th colspan="2" style="text-align : center">Action</th>
                </tr>
            </thead>
            <br>
            <tbody id="myTable">
                <?php foreach ($producers as $key => $producer): ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $producer->name_producer ?></td>
                    <td><?php echo $producer->address ?></td>
                    <td><?php echo $producer->phone ?></td>
                    <td><?php echo $producer->tax_code ?></td>
                    <td><img src="<?= 'data:image;base64,'.base64_encode($producer->image)?> " width="60px"
                            height="60px">
                    </td>
                    <td> <a href="producer.view.php?page=edit&id=<?php echo $producer->id; ?>"
                            class="btn btn-info btn-sm">Update</a></td>
                    <td> <a href="producer.view.php?page=delete&id=<?php echo $producer->id; ?>"
                            class="btn btn-warning btn-sm">Delete</a></td>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</head>

</html>