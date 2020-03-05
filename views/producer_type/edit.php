<?php
use Model\LoginConnection; ?>
<?php
    $connect = new LoginConnection();
    $connect = $connect->connect(); ?>
<!DOCTYPE html>
<html lang="en">
<div class="container center">
    <div class="col-8 col-md-8">
        <div class="row">
            <div class="col-8">
                <h1>Update Shoes</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id1" value="<?php echo $protype->id_producer; ?>" />
                    <input type="hidden" name="id2" value="<?php echo $protype->id_type; ?>" />
                    <div class="form-group">
                        <label>Name</label>
                    </div>

                    <div class="form-group">
                        <label>Producer</label>
                        <select class="form-control" name="id_producer">
                            <?php
                $sql = "SELECT * FROM producer";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if($row['id'] === $protype->id_producer){
                        echo "<option value=" . $row['id'] . " selected>" . $row['id'] . " - " . $row['name_producer'] . "</option>";
                    }
                    else{
                        echo "<option value=" . $row['id'] . " >" . $row['id'] . " - " . $row['name_producer'] . "</option>";
                    }
                    
                    
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
                            if($row['id'] === $protype->id_type )
                            {
                                echo "<option value=" . $row['id'] . " selected>" . $row['id'] . " - " . $row['name_type'] . "</option>";
                            } else{
                                echo "<option value=" . $row['id'] . ">" . $row['id'] . " - " . $row['name_type'] . "</option>";
                            }
                            
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <textarea name="amount" class="form-control"><?php echo $protype->amount; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary" />
                        <a href="producer_type.view.php" class="btn btn-default">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</html>