<?php
require("../../../db-connect.php");
$id= $_GET["id"];
$sql = "SELECT * FORM "
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../component/headerLayout.php">
    <title>酒譜清單</title>
    <?php require("../../component/headerLayout.php") ?>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">
        <h2>商品詳情</h2>


    </div>

    <?php require("../../component/footerLayout.php") ?>
</body>

</html>