<?php require_once('../../model/loginConnection.php');?>

<!DOCTYPE html>
<html lang="en">
<div class="container center">
    <div class="col-8 col-md-8">
        <div class="row">
            <div class="col-8">
                <h1>Add Type</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name_Type </label>
                        <input type="text" class="form-control" name="name_type" placeholder="Nhập loại giày" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" id="image"
                            value="<?= 'data:image;base64,'.base64_encode($pro->image)?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php

if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>