<?php
require("../../../db-connect.php");
if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}
$sql = "SELECT * FROM order_list";
$result = $conn->query($sql);
$total = $result->num_rows;



$per_page = 10;

$page_count = CEIL($total / $per_page);

$start = ($p - 1) * $per_page;
if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.user_id = '$user_id'
    ORDER BY order_list.order_time DESC
    LIMIT $start,$per_page
";
} else if (isset($_GET["logistics_state"])) {
    $logistics_state = $_GET["logistics_state"];
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.logistics_state = '$logistics_state'
    ORDER BY order_list.order_time DESC
    LIMIT $start,$per_page
    ";
} else {
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    ORDER BY order_list.order_time DESC
    LIMIT $start,$per_page
";
}



$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$stasql = "SELECT * FROM logistics_state_cate";
$staresult = $conn->query($stasql);
$starows = $staresult->fetch_all(MYSQLI_ASSOC);

// var_dump($starow);
// exit;






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
    <style>
        td.order-list_num {
            width: 400px;
        }

        td.order-list_time {
            width: 190px;
        }

        td.order-list_stace {
            width: 100px;
        }

        td.order-list_name a {
            width: 450px;
        }

        td.order-list_name a {
            text-decoration: none;

        }
    </style>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">
        <h2>訂單列表</h2>
        <div class="d-flex justify-content-between align-items-center ">
            <div class="form-floating ">
            </div>
        </div>
        <!-- <div class="py-2 text-end">
            <a class="btn btn-primary" href="order-list.php">回所有訂單</a>
        </div> -->
        <div class="container ">
            <div class="py-2 text-end">
            <ul class="nav nav-pills  ">
            <a class="btn btn-primary" href="order-list.php">全部</a>
                    <?php foreach ($starows as $starow) : ?>
                        <li class="nav-items">
                            <a class="nav-link" aria-curret="page" href="order-list.php?logistics_state=<?= $starow["id"] ?>"><?= $starow["name"] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="py-2">

                <div class="py-2 text-end">
                    第 <?= $p ?> /<?= $page_count ?> 頁 ,共 <?= $total ?> 筆
                </div>
                <div class="text-end">
                    <a href=""></a>
                </div>
                <div class="col-auto">
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <td class="order-list_num">訂單編號</td>
                            <td class="order-list_name">會員名稱</td>
                            <td class="order-list_stace">訂單狀態</td>
                            <td class="order-list_time text-center">下單時間</td>
                            <td class="text-end">功能列</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) : ?>
                            <tr>
                                <td class="order-list_num">
                                    <?= $row["id"] ?>
                                </td>
                                <td class="order-list_name">
                                    <a href="order-list.php?user_id=<?= $row["user_id"] ?>"><?= $row["user_list_name"] ?></a>
                                </td>
                                <td class="order-list_stace"><?= $row["logistics_state_cate_name"] ?></td>
                                <td class="order-list_time text-end"><?= $row["order_time"] ?></td>
                                <td class="text-end">
                                    <a class="px-2" href="./order-detail.php?user_id=<?= $row["user_id"] ?>&order_id=<?= $row["id"] ?>">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                            <li class="page-item <?php if ($i == $p) echo "active"; ?>">
                                <a class="page-link" href="order-list.php?p=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
            <?php require("../../component/footerLayout.php") ?>
</body>

</html>