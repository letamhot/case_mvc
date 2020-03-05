<h1>Bạn chắc chắn muốn xóa  không?</h1>

<h3><?php echo $protype->id1; ?></h3>
<h3><?php echo $protype->id2; ?></h3>



<form action="./producer_type.view.php?page=delete" method="post">
    <input type="hidden" name="id1" value="<?php echo $protype->id1; ?>"/>
    <input type="hidden" name="id2" value="<?php echo $protype->id2; ?>"/>

    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-warning btn-sm"/>
        <a class="btn btn-danger btn-sm" href="producer_type.view.php">Cancel</a>
    </div>
</form>