<?php
require("../../../db-connect.php");
if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}
//頁碼
// $sql = "SELECT * FROM order_list";
// $result = $conn->query($sql);
// $total = $result->num_rows;



$per_page = 10;

// $page_count = CEIL($total / $per_page);

$start = ($p - 1) * $per_page;
if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.user_id = '$user_id'
    ORDER BY order_list.order_time DESC
    ";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);
    $start = ($p - 1) * $per_page;

    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.user_id = '$user_id'
    ORDER BY order_list.order_time DESC
    LIMIT $start,$per_page
    ";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else if (isset($_GET["logistics_state"])) {
    $logistics_state = $_GET["logistics_state"];
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.logistics_state = '$logistics_state'
    ORDER BY order_list.order_time DESC
    ";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);
    $start = ($p - 1) * $per_page;

    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.logistics_state = '$logistics_state'
    ORDER BY order_list.order_time DESC
    LIMIT $start,$per_page
    ";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else if (isset($_GET["date1"]) && isset($_GET["date2"])) {
    $date1= $_GET["date1"];
    $date2= $_GET["date2"];

    $date2time=date('Y-m-d H:i:s', strtotime("+1 day", strtotime($date2)));
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.order_time >= '$date1' AND order_list.order_time <= '$date2time'
    ORDER BY order_list.order_time DESC
    ";

    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);
    $start = ($p - 1) * $per_page;

    $date2time=date('Y-m-d H:i:s', strtotime("+1 day", strtotime($date2)));
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.order_time >= '$date1' AND order_list.order_time <= '$date2time'
    ORDER BY order_list.order_time DESC
    LIMIT $start,$per_page
    ";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    ORDER BY order_list.order_time DESC
    ";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);
    $start = ($p - 1) * $per_page;

    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    ORDER BY order_list.order_time DESC
    LIMIT $start,$per_page
    ";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}

// var_dump($sql);
// exit;



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
            <div class="py-2 d-flex justify-content-between">
                <ul class="nav nav-pills  ">
                    <li class="nav-items">
                        <a class="nav-link <?= (!isset($_GET['logistics_state'])) ? "active" : "" ?>" href="order-list.php">全部</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET['logistics_state'])) : ?><?= $_GET['logistics_state'] == 1 ? "active" : "" ?><?php endif; ?> " href="order-list.php?logistics_state=1">待出貨</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET['logistics_state'])) : ?><?= $_GET['logistics_state'] == 2 ? "active" : "" ?><?php endif; ?>" href="order-list.php?logistics_state=2">已出貨</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET['logistics_state'])) : ?><?= $_GET['logistics_state'] == 3 ? "active" : "" ?><?php endif; ?>" href="order-list.php?logistics_state=3">已送達</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET['logistics_state'])) : ?><?= $_GET['logistics_state'] == 4 ? "active" : "" ?><?php endif; ?>" href="order-list.php?logistics_state=4">已取消</a>
                    </li>
                </ul>
                <div class=" text-end">
                    <form action="">
                        <div class="row justify-content-end align-items-center">
                            <div class="col-auto">
                                <input type="date" name="date1" class="form-control" placeholder="下單時間" required
                                    <?php if (isset($_GET["date1"]) && isset($_GET["date2"])):?>
                                    value="<?= $date1?>"
                                    <?php endif;?>
                                >
                            </div>
                            <span class="col-auto">~</span>
                            <div class="col-auto">
                                <input type="date" name="date2" class="form-control" placeholder="下單時間" required
                                    <?php if (isset($_GET["date1"]) && isset($_GET["date2"])):?>
                                    value="<?= $date2?>"
                                    <?php endif;?>
                                >
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-dark">
                                    搜尋
                                </button>
                            </div>
    
                        </div>
                    </form>
                </div>
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
                                <a class="page-link" href="order-list.php?p=<?php if(isset($_GET["user_id"])) :?>&user_id=<?=$user_id?>&<?php endif;?>&
                                    <?php if(isset($_GET["logistics_state"])) :?>&logistics_state=<?=$logistics_state?>&<?php endif;?>&
                                    <?php if(isset($_GET["date1"]) && isset($_GET["date2"])):?>&date1=<?= $date1?>&date2=<?=$date2?>&<?php endif;?>p=<?=$i?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
            <?php require("../../component/footerLayout.php") ?>
</body>

</html>