<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <h2 style="margin: 20px;text-align: center;">Account List</h2>
    <div class="container" id="container">
        <div class="md-form mt-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="tableSearch"
                style="width: 25%; float: right; margin: 15px;">
        </div>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th colspan="1" >Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach ($logins as $key => $login): ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $login->Name ?></td>
                    <td><?php echo $login->email ?></td>
                    <td> <a href="index.php?page=delete&id=<?php echo $login->id; ?>"
                            class="btn btn-warning btn-sm">Delete</a></td>
                    </td>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</head>

</html>