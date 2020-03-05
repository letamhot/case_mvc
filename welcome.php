<?php
$connect = new PDO("mysql:host=localhost;dbname=c12;charset=utf8", "root", "");
?>
<?php include 'views/login/access.php';
echo accessIndex();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <?php include "views/partials/header.php" ;?>

</head>

<body>
    <?php include 'views/partials/navbar_welcome.php';?>
    <nav class="navbar navbar-expand-sm bg-light justify-content-center" id="video">

    </nav>
    </br>
    <h1 style="text-align: center;">List Product:</h1>
    <?php
		// require_once('model/loginConnection.php');
		$result = $connect->prepare("SELECT * FROM product ORDER BY id ASC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>

    <div class="row images-shoes" style="background-color: white">
        <hr class="clearfix w-100 d-md-none">
        <div class="thumbnail">
            <img class="img-thumbnail" src="<?= 'data:image;base64,'.base64_encode($row['image']);?>" width="600"
                height="400">
            </a>
            <div class="desc"><?php echo $row['name']; ?><p><?php echo $row['price_input']; ?> VND</p>
            </div>
        </div>

        <?php } ?>
    </div>
    <br>

</body>
<?php include "views/partials/footer.php" ;?>

</html>