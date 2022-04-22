<?php
require("../../../db-connect.php");

if(isset($_GET["user_id"])){
    $user_id=$_GET["user_id"];
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    WHERE order_list.user_id = '$user_id'
    ORDER BY order_list.order_time DESC
";
}else{
    $sql = "SELECT order_list.*, order_list.user_id, user_list.name AS user_list_name, order_list.logistics_state, logistics_state_cate.name AS logistics_state_cate_name FROM order_list
    JOIN user_list ON order_list.user_id = user_list.id
    JOIN logistics_state_cate ON order_list.logistics_state = logistics_state_cate.id
    ORDER BY order_list.order_time DESC
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

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="form-floating mb-3">
                <input type="text" class="form-control round-0 border-0 border-bottom" id="searchInput">
                <label for="searchInput">search</label>
            </div>
            <div>
                <a class="btn btn-primary" href="order-list.php">回所有訂單</a>
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
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td>
                            <a href="./order-detail.php?order_id=<?=$row["id"]?>"><?=$row["id"]?></a>
                        </td>
                        <td>
                            <a href="order-list.php?user_id=<?=$row["user_id"]?>"><?= $row["user_list_name"] ?></a>
                        </td>
                        <td><?= $row["logistics_state_cate_name"] ?></td>
                        <td><?= $row["order_time"] ?></td>
                        <td class="text-end">
                            <a class="px-2" href="./order-detail.php?id=<?=$row["user_id"]?>"><i class="fa-solid fa-eye"></i></a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php require("../../component/footerLayout.php") ?>
</body>

</html>