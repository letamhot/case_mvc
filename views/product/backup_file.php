<h1>Bạn chắc chắn muốn lấy lại  không?</h1>

<h3><?php echo $pro->name; ?></h3>

<form action="./index.php?page=backupfile" method="post">
    <input type="hidden" name="id" value="<?php echo $pro->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-warning btn-sm"/>
        <a class="btn btn-danger btn-sm" href="index.php">Cancel</a>
    </div>
</form>