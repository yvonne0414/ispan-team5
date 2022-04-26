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

// $sql = "SELECT * FROM coupon_list";
// $result = $conn->query($sql);

// $total = $result->num_rows;
// //檢查多少筆
// $per_page = 4;
// $page_count = CEIL($total / $per_page);

// $start = ($p - 1) * $per_page;


if (isset($_GET["date1"]) && isset($_GET["date2"])) {
    $date1 = $_GET["date1"];
    $date2 = $_GET["date2"];

    // var_dump($date1);
    // var_dump($date2);

    $sql = "SELECT * FROM coupon_list 
    WHERE start_time>= '$date1' AND end_time <= '$date2'
    ORDER BY id $order ";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    //檢查多少筆
    $total = $result->num_rows;
    $per_page = 4;
    $page_count = CEIL($total / $per_page);

    $start = ($p - 1) * $per_page;

    $sql = "SELECT * FROM coupon_list 
    WHERE start_time>= '$date1' AND end_time <= '$date2'
    ORDER BY id $order LIMIT $start,$per_page";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $sql = "SELECT * FROM coupon_list ORDER BY id $order";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    //檢查多少筆
    $total = $result->num_rows;
    $per_page = 4;
    $page_count = CEIL($total / $per_page);

    $start = ($p - 1) * $per_page;

    $sql = "SELECT * FROM coupon_list ORDER BY id $order LIMIT $start,$per_page";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}

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

            <div>
                <form action="couponList.php" method="get">
                    <div class="row justify-content-end align-items-center">
                        <div class="col-auto">
                            <input type="date" name="date1" class="form-control" placeholder="開始時間" required <?php if (isset($_GET["date1"]) && isset($_GET["date2"])) : ?> value="<?= $date1 ?>" <?php endif; ?>>
                        </div>
                        <span class="col-auto">~</span>
                        <div class="col-auto">
                            <input type="date" name="date2" class="form-control" placeholder="結束時間" required <?php if (isset($_GET["date1"]) && isset($_GET["date2"])) : ?> value="<?= $date2 ?>" <?php endif; ?>>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-dark">
                                搜尋
                            </button>
                        </div>

                    </div>
                </form>
            </div>
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

                    <?php
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
                        <li class="page-item <?php if ($i == $p) echo "active"; ?>">
                        <a class="page-link" href="couponList.php?<?php if(isset($_GET["date1"]) && isset($_GET["date2"])):?>&date1=<?= $date1?>&date2=<?=$date2?>&<?php endif;?>p=<?=$i?>"><?=$i?></a>
            </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>

    <?php require("../../component/footerLayout.php") ?>


</body>

</html>