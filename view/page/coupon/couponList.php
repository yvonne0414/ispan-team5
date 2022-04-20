<?php
require("../../../db-connect.php");

// $sql="SELECT id, prd_num, name, main_img, price, status FROM prd_list"
// $result = $conn->query($sql);
// $rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../component/headerLayout.php">
    <title>優惠券列表</title>
    <?php require("../../component/headerLayout.php") ?>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">
        <h2>優惠券列表</h2>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="form-floating mb-3">
                <input type="text" class="form-control round-0 border-0 border-bottom" id="searchInput">
                <label for="searchInput">search</label>
            </div>
            <div class="d-flex flex-nowrap">
                <div class="">
                    <a class="btn btn-secondary" href="">歷史紀錄</a>
                </div>
                <div class="mx-2">
                    <a class="btn btn-primary " href="">新增優惠</a>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <td>序號</td>
                    <td>優惠名稱</td>
                    <td>折抵方案</td>
                    <td>金額限制</td>
                    <td>優惠日期</td>
                    <td class="text-end">功能列</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>首次消費滿2000元,即折抵200元</td>
                    <td>折抵200元</td>
                    <td>滿2000元</td>
                    <td>td123</td>
                    <td class="text-end">
                        <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                        <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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