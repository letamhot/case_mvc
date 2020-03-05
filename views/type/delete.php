<h1>Bạn chắc chắn muỗn xóa  không?</h1>

<h3><?php echo $type->name_type; ?></h3>

<form action="./type.view.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $type->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-warning btn-sm"/>
        <a class="btn btn-danger btn-sm" href="type.view.php">Cancel</a>
    </div>
</form>