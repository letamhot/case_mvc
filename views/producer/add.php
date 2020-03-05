
<!DOCTYPE html>
<html lang="en">
<div class="container center" >
    <div class="col-8 col-md-8">
        <div class="row">
            <div class="col-8">
            <h1>ADD Shoes</h1>
        </div>
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <!-- <input type="hidden" name="id"> -->
                <div class="form-group">
                    <label>Name_Producer </label>
                    <input type="text" class="form-control" name="name_producer" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Địa Chỉ" required>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="phone" placeholder="SDT" required>
                </div>
                <div class="form-group">
                    <label>Tax_Code</label>
                    <input type="number" class="form-control" name="tax_code" placeholder="Mã số thuế" required>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" id="image" value="<?= 'data:image;base64,'.base64_encode($pro->image)?>">
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



