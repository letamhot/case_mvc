<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <h2 style="margin: 20px;text-align: center;">List Producer_Type</h2>
    <div class="container">
        <div class="md-form mt-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="tableSearch"
                style="width: 25%; float: right; margin: 15px;">
        </div>
        <br>
        <div class="container" id="container">
        <a href="producer_type.view.php?page=add" class="btn btn-success btn-sm" style="float:left">ADD</a>
        <a href="producer_type.view.php?page=show_backuppro_type" class="btn btn-warning btn-sm"
            style="float:right">Backup
            File</a>
        <br>
        <!-- <table class="table" > -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID_Producer</th>
                    <th>Producer</th>
                    <th>ID_Type_product</th>
                    <th>Type_product</th>
                    <th>Amount</th>
                    <th  colspan="2" style="text-align : center"> Action</th>
                </tr>
            </thead>
            <br>
            <tbody id="myTable">
                <?php foreach ($protypes as $key => $protype): ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $protype->id_producer?></td>
                    <td><?php echo $protype->name_producer?></td>
                    <td><?php echo $protype->id_type?></td>
                    <td><?php echo $protype->name_type?></td>
                    <td><?php echo $protype->amount ?></td>
                    <td> <a href="producer_type.view.php?page=edit&id1=<?php echo $protype->id_producer; ?>&id2=<?php echo $protype->id_type; ?>"
                            class="btn btn-info btn-sm">Update</a>
                    </td>
                    <td> <a href="producer_type.view.php?page=delete&id1=<?php echo $protype->id_producer; ?>&id2=<?php echo $protype->id_type; ?>"
                            class="btn btn-warning btn-sm">Delete</a></td>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</head>

</html>