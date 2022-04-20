<?php
require("../../db-connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../component/headerLayout.php">
    <title>酒譜清單</title>
    <?php require("../component/headerLayout.php") ?>
</head>

<body>
    <?php require("../component/header.php") ?>
    <?php require("../component/sidemenu.php") ?>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <h2>酒譜列表</h2>
            <a class="shadow-sm px-3" href="create-bartd.php"><i class="fa-solid fa-plus display-5 text-dark"></i></a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th scope="col">id</th>
                <th scope="col">調酒名稱</th>
                <th class="text-end" scope="col">修改</th>
            </tr>
            <tr>
                <td scope="row">001</td>
                <td>first</td>
                <td class="text-end">
                    <a href=""><i class="fa-solid fa-pen"></i></a>
                    <a href=""><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            <tr>
                <td scope="row">002</td>
                <td>second</td>
                <td class="text-end">
                    <a href=""><i class="fa-solid fa-pen"></i></a>
                    <a href=""><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
        </table>
    </div>

    <?php require("../component/footerLayout.php") ?>
</body>

</html>