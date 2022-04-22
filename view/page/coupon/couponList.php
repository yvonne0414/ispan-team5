<?php
require("../../../db-connect.php");
session_start();

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
        <h1><?php
            // if (isset( $_SESSION["message"] ) ){
            //     echo  $_SESSION["message"];
            // }

            ?></h1>

        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <form action="./prdList.php" method="get">
                <div class="d-flex ">
                    <div class="me-2">
                        <select class="form-control round-0 border-0 border-bottom w-auto"  name="searchType" id="searchType">
                        <option disabled>搜索類型</option>
                        <option value="name" selected>名稱</option>
                        </select>
                    </div>
            
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="search" name="searchInput">
                        <button class="btn btn-secondary  round-0" type="submit" id="searchBtn">搜尋</button>
                    </div>
                </div>
            </form>
            <div>
                <a class="btn btn-outline-dark" href="coupon-info.php">新增商品</a>
            </div>
        </div>


        <!-- <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="form-floating mb-3">
                <input type="text" class="form-control round-0 border-0 border-bottom" id="searchInput">
                <label for="searchInput">search</label>
            </div>
            <div class="d-flex flex-nowrap">
                <div class="">
                    <a class="btn btn-secondary" href="">歷史紀錄</a>
                </div>
                <div class="mx-2">
                    <a class="btn btn-primary " href="coupon-info.php">新增優惠</a>
                </div>
            </div>
        </div> -->

        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <td>序號</td>
                    <td>優惠名稱</td>
                    <td>折抵方案</td>
                    <td>金額下限</td>
                    <td>金額上限</td>
                    <td>優惠活動日期</td>
                    <td class="text-end">功能列</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-danger">001</td>
                    <td>首次消費滿2000元,即折抵200元</td>
                    <td>折抵200元</td>
                    <td>2000元</td>
                    <td>20000元</td>
                    <td>2022/04/01 ~ 2022/04/30</td>
                    <td class="text-end">
                        <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                        <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <!-- <tr>
                    <td>002</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-end">
                        <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                        <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr> -->
                <?php $sql = "SELECT * FROM coupon_list";
                $result = $conn->query($sql);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($rows as $row) :
                ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <?php if($row["coupon_cate"] == 1):?>
                    <td>折抵<?= $row["discount"] ?>元</td>
                    <?php endif;?>
                    <?php if($row["coupon_cate"] == 2):?>
                    <td><?= $row["discount"] ?>折</td>
                    <?php endif;?>
                    <td><?= $row["rule_min"] ?>元</td>
                   
                    <td><?= $row["rule_max"]?>元</td>
                    <td><?= $row["start_time"]?>~<?= $row["end_time"] ?></td>
                    <td class="text-end">
                        <a class="px-2" href="edit-coupon.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-pen"></i></a>
                        <a class="px-2" href="./doDelete.php?id=<?=$row["id"]?>"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>

                <?php
                endforeach;
                ?>

            </tbody>
        </table>

    </div>

    <?php require("../../component/footerLayout.php") ?>


</body>

</html>
