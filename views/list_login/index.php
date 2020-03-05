<?php  
include '../login/access.php';
    // echo accessView();
    echo adminView();

    ?>
<?php

require "../../model/loginConnection.php";
require "../../model/loginDB.php";
require "../../model/login.php";
require "../../Controllers/LoginController.php";

use \Controllers\LoginController;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Login</title>
    <?php include "../partials/header.php" ;?>

</head>

<body>
    <?php include '../partials/navbar.php';?>
    <?php
    $controller = new LoginController();
    $page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;
    switch ($page){
        case 'delete':
            $controller->delete();
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