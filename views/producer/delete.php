<h1>Bạn chắc chắn muốn xóa không?</h1>

<h3><?php echo $producer->name_producer; ?></h3>

<form action="./producer.view.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $producer->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-warning btn-sm"/>
        <a class="btn btn-danger btn-sm" href="producer.view.php">Cancel</a>
    </div>
</form>