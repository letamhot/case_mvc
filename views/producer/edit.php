
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
                    <input type="hidden" name="id" value="<?php echo $producer->id; ?>" />
                    <div class="form-group">
                        <label>Name_Producer</label>
                        <textarea name="name_producer"
                            class="form-control"><?php echo $producer->name_producer; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control"><?php echo $producer->address; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <textarea name="phone" class="form-control"><?php echo $producer->phone; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tax_Code</label>
                        <textarea name="tax_code" class="form-control"><?php echo $producer->tax_code; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                        <img src="<?= 'data:image;base64,'.base64_encode($producer->image)?> " width="60px"
                            height="60px">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary" />
                        <a href="producer.view.php" class="btn btn-default">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</html>