<?php
include '../login/access.php';
    echo adminView();
?>
<?php

require "../../model/loginConnection.php";
require "../../model/product/productDB.php";
require "../../model/product/product.php";
require "../../Controllers/productController.php";

use \Controllers\ProductController;

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoes List</title>
    <?php include "../partials/header.php" ;?>

</head>

<body>
    <?php include '../partials/navbar.php';?>
    <?php
$controller = new ProductController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
switch ($page) {
    case 'add':
        $controller->add();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'backupfile':
        $controller->backupfile();
        break;
    case 'show_backup':
        $controller->showfile();
        break;
    default:
        $controller->index();
        break;
}
?>
    </div>
    <br>
</body>
<?php include "../partials/footer.php" ;?>
<script src="../../public/js/search.js"></script>

</html>