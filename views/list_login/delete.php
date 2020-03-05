<h1>Delete Users?</h1>

<h3><?php echo $login->Name; ?></h3>

<form action="./index.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $login->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-warning btn-sm"/>
        <a class="btn btn-danger btn-sm" href="index.php">Cancel</a>
    </div>
</form>