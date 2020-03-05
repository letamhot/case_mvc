<h1>Bạn chắc chắn muốn xóa không?</h1>

<h3><?php echo $pro->name; ?></h3>

<form action="./index.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $pro->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-warning btn-sm"/>
        <a class="btn btn-danger btn-sm" href="index.php">Cancel</a>
    </div>
</form>