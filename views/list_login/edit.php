<h2>Update Users</h2>
<form method="post" action="./index.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $login->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="Name" value="<?php echo $login->Name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Email</label>
        <textarea name="email" class="form-control"><?php echo $login->email; ?></textarea>
    </div>
    <div class="form-group">
        <label>Password</label>
        <textarea type = "password" name="password" class="form-control"><?php echo $login->password; ?></textarea>
    </div>
    <!--  -->
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>