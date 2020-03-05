<?php

use Model\LoginConnection;

require_once('../../model/loginConnection.php');
$connect = new LoginConnection();
$connect = $connect->connect();
?>

<div class="container center">
    <div class="col-8 col-md-8">
        <div class="row">
            <div class="col-8">
                <h1>Add Shoes</h1>
            </div>
            <div class="col-8">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên" required>
                    </div>
                    <div class="form-group">
                        <label>Type_product</label>
                        <select class="form-control" name="type">
                            <?php
                        $sql = "SELECT * FROM type_product";
                        $result = $connect->query($sql);
                        foreach ($result as $row) {
                            echo "<option value=" . $row['id'] . ">" . $row['id'] . " - " . $row['name_type'] . "</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Producer</label>
                        <select class="form-control" name="producer">
                            <?php
                        $sql = "SELECT * FROM producer";
                        $result = $connect->query($sql);
                        foreach ($result as $row) {
                            echo "<option value=" . $row['id'] . ">" . $row['id'] . " - " . $row['name_producer'] . "</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Số lượng" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" id="image"
                            value="<?= 'data:image;base64,'.base64_encode($pro->image)?>">
                    </div>
                    <div class="form-group">
                        <label>Price_input</label>
                        <input type="number" class="form-control" name="price_input" placeholder="Số tiền" required>
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
</body>

</html>