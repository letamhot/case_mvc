<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add Users</h1>
            <a href="../product/index.php"><i class="fa fa-address-book
" aria-hidden="true"></i> List Shoes</a>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>Tên </label>
                    <input type="text" class="form-control" name="Name" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập mail" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>