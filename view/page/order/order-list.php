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
} else {
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    ORDER BY order_list.order_time DESC
    LIMIT $start,$per_page
";
}


// $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
// JOIN user_list ON order_list.user_id = user_list.id
// JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id

// ";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
//var_dump($rows);
//exit;
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
        <div class="d-flex justify-content-between align-items-center ">
            <div class="form-floating ">
            </div>
        </div>
        <div class="py-2 text-end">
            <a class="btn btn-primary" href="order-list.php">回所有訂單</a>

        </div>
        <div class="py-2 text-end">
            第 <?= $p ?> /<?= $page_count ?> 頁 ,共 <?= $total ?> 筆
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
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td>
                            <?= $row["id"] ?>
                        </td>
                        <td>
                            <a href="order-list.php?user_id=<?= $row["user_id"] ?>"><?= $row["user_list_name"] ?></a>
                        </td>
                        <td><?= $row["logistics_state_cate_name"] ?></td>
                        <td><?= $row["order_time"] ?></td>
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
                <?php for ($i=1; $i <=$page_count; $i++) : ?>
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