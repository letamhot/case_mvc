<h1>Bạn chắc chắn muốn lấy lại không?</h1>

<form action="./producer_type.view.php?page=backuppro_typefile" method="post">
    <input type="hidden" name="id1" value="<?php echo $protype->id1; ?>"/>
    <input type="hidden" name="id2" value="<?php echo $protype->id2; ?>"/>

    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-warning btn-sm"/>
        <a class="btn btn-danger btn-sm" href="producer_type.view.php">Cancel</a>
    </div>
</form>