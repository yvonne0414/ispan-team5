<?php
require("../../../db-connect.php");
//session_start();


if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

if (!isset($_GET["type"])) {
    $type = "1";
} else {
    $type = $_GET["type"];
}

switch ($type) {
    case "1":
        $order = "ASC";
        break;
    case "2":
        $order = "DESC";
        break;
    default:
        $order = "ASC";
        break;
}


$sql = "SELECT * FROM coupon_list";
$result = $conn->query($sql);

$total = $result->num_rows;
//檢查多少筆
$per_page = 4;
$page_count = CEIL($total / $per_page);

$start = ($p - 1) * $per_page;

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
            <form action="couponList.php" method="get">
                <div class="d-flex ">
                    <div class="me-2">
                        <select class="form-control round-0 border-0 border-bottom w-auto" name="searchType" id="searchType">
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
                <a class="btn btn-outline-dark" href="coupon-info.php">新增優惠券</a>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="text-start">
                <a class="btn btn-outline-dark" href="couponList.php?p=<?= $p ?>&type=1">正序</a>
                <a class="btn btn-dark text-white" href="couponList.php?p=<?= $p ?>&type=2">反序</a>
            </div>
            <div class="py-2 text-end">
                第 <?= $p ?> /<?= $page_count ?> 頁 ,共 <?= $total ?> 筆
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
        <div class="py-2">
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
                    <!-- <tr>
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
                </tr> -->

                    <?php $sql = "SELECT * FROM coupon_list ORDER BY id $order LIMIT $start,$per_page";
                    $result = $conn->query($sql);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    for ($i = 0; $i < count($rows); $i++) :
                        $row = $rows[$i];
                    ?>
                        <tr>
                            <td><?= $i + 1 + ($p - 1) * $per_page ?></td>
                            <td><?= $row["name"] ?></td>
                            <?php if ($row["coupon_cate"] == 1) : ?>
                                <td>折抵<?= $row["discount"] ?>元</td>
                            <?php endif; ?>
                            <?php if ($row["coupon_cate"] == 2) : ?>
                                <td><?= $row["discount"] ?>折</td>
                            <?php endif; ?>
                            <td><?= $row["rule_min"] ?>元</td>

                            <td><?= $row["rule_max"] ?>元</td>
                            <td><?= $row["start_time"] ?>~<?= $row["end_time"] ?></td>
                            <td class="text-end">
                                <a class="px-2" href="edit-coupon.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-pen"></i></a>
                                <a class="px-2" href="./doDelete.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php
                    endfor;
                    ?>

                </tbody>
            </table>
        </div>
        <!-- 頁數 -->
        <div>
            <nav aria-label="Page navigation example d-flex">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                        <li class="page-item <?php if ($i == $p) echo "active"; ?>"><a class="page-link" href="couponList.php?p=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>


    <?php require("../../component/footerLayout.php") ?>


</body>

</html>