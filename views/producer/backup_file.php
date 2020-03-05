<h1>Bạn chắc chắn muốn lấy lại không?</h1>

<h3><?php echo $producer->name_producer; ?></h3>

<form action="./producer.view.php?page=backupfile" method="post">
    <input type="hidden" name="id" value="<?php echo $producer->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-warning btn-sm"/>
        <a class="btn btn-danger btn-sm" href="producer.view.php">Cancel</a>
    </div>
</form>