<?php require_once('../../model/loginConnection.php');?>

<!DOCTYPE html>
<html lang="en">
<div class="container center">
    <div class="col-8 col-md-8">
        <div class="row">
            <div class="col-8">
                <h1>Update Type</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $type->id; ?>" />
                    <div class="form-group">
                        <label>Name_Type</label>
                        <textarea name="name_type" class="form-control"><?php echo $type->name_type; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                        <img src="<?= 'data:image;base64,'.base64_encode($type->image)?> " width="60px" height="60px">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary" />
                        <a href="type.view.php" class="btn btn-default">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</html>