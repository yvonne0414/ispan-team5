<?php
require("../../../db-connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../component/headerLayout.php">
    <title>訂單列表</title>
    <?php require("../../component/headerLayout.php") ?>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">
        <h2>訂單列表</h2>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="form-floating mb-3">
                <input type="text" class="form-control round-0 border-0 border-bottom" id="searchInput">
                <label for="searchInput">search</label>
            </div>

        </div>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <td>訂單編號</td>
                    <td>會員名稱</td>
                    <td>訂單狀態</td>
                    <td>下單時間</td>
                    <td class="text-end">功能列</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>joe</td>
                    <td>待出貨</td>
                    <td>2022/05/30 10:40:15</td>
                    <td class="text-end">
                        <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                        <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>joe</td>
                    <td>已出貨</td>
                    <td>2022/05/20 10:40:15</td>
                    <td class="text-end">
                        <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                        <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>joe</td>
                    <td>已送達</td>
                    <td>2022/05/20 10:40:15</td>
                    <td class="text-end">
                        <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                        <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>joe</td>
                    <td>已取消</td>
                    <td>2022/05/20 10:40:15</td>
                    <td class="text-end">
                        <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                        <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    <?php require("../../component/footerLayout.php") ?>
</body>

</html>