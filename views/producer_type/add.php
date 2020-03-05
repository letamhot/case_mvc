<?php

use Model\LoginConnection;

require_once('../../model/loginConnection.php');
$connect = new LoginConnection();
$connect = $connect->connect();
?>
<div class="container center" >
    <div class="col-8 col-md-8">
        <div class="row">
            <div class="col-8">
            <h1>ADD Shoes</h1>
        </div>
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label>Producer</label>
                    <select class="form-control" name="id_producer">
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
                    <label>Type_product</label>
                    <select class="form-control" name="id_type">
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
                    <label>Amount</label>
                    <input type="number" class="form-control" name="amount" placeholder="Số lượng" required>
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


