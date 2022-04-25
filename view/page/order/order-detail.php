<?php
require("../../../db-connect.php");
$user_id = $_GET['user_id'];
$order_id = $_GET['order_id'];





$usersql = "SELECT * FROM user_list
WHERE id = '$user_id'
";
$userresult = $conn->query($usersql);
$userrow = $userresult->fetch_assoc();

// echo "userrow";
// echo "<br>";
// var_dump($userrow);
// echo "<br>";



$prdsql = "SELECT prd_id, amount FROM order_detail
WHERE order_id = '$order_id'
";
$prdresult = $conn->query($prdsql);
$prdrows = $prdresult->fetch_all(MYSQLI_ASSOC);

// echo "prdrow";
// echo "<br>";
// var_dump($prdrows);
// echo "<br>";
//echo $prdrows[0] ;
//var_dump($prdrows[0]);

// echo $prdrows[1] ["prd_id"];
// echo $prdrows[2] ["prd_id"];

// foreach($prdrows as $prdrow ){
//   echo "<hr>" ;
//   var_dump($prdrow["prd_id"]); 
// }

// $prd_id =$prdrow["prd_id"];
// var_dump($prd_id);





$ordsql = "SELECT logistics_state, order_time FROM order_list
WHERE  id='$order_id'
";
$ordresult = $conn->query($ordsql);
$ordrow = $ordresult->fetch_assoc();;
// echo "ordrow";
// echo "<br>";
// var_dump($ordrow);
// echo "<br>";
// echo "<hr>";
$state = $ordrow["logistics_state"];
// var_dump($state);
// echo "<hr>";

$stasql = "SELECT * FROM logistics_state_cate 
WHERE id = '$state'
";

$staresult = $conn->query($stasql);
$starow = $staresult->fetch_assoc();;
// echo "starow";
// echo "<br>";
// var_dump($starow);
// echo "<br>";
$prdlistsql = "SELECT prd_num, name, price FROM prd_list

";
$prdlistresult = $conn->query($prdlistsql);
$prdlistrow = $prdlistresult->fetch_assoc();;
// echo "prdlistrow";
// echo "<br>";
// var_dump($prdlistrow);
// echo "<br>";



// var_dump($userrow);
//  exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>訂單詳細資訊</title>
  <?php require("../../component/headerLayout.php") ?>
</head>

<body>
  <?php require("../../component/header.php") ?>
  <?php require("../../component/sidemenu.php") ?>
  <div class="container py-5">
    <div>
      <a class="btn btn-dark" href="order-list.php">返回列表</a>
    </div>
    <div class="container py-5">
      <form>
        <div class="row mb-3">
          <label for="id" class="col-sm-2 col-form-label">訂單編號</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="id" id="id" value="<?= $order_id ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="user" class="col-sm-2 col-form-label">訂購者</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="user" value="<?= $userrow["name"] ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="phone" class="col-sm-2 col-form-label">電話</label></label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" id="phone" value="<?= $userrow["phone"] ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="address" class="col-sm-2 col-form-label">地址</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="address" value="<?= $userrow["address"] ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="ord_state" class="col-sm-2 col-form-label">訂單狀態</label>
          <div class="col-sm-10">
            <input class="form-control" id="ord_state" value="<?= $starow["name"] ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="ord_time" class="col-sm-2 col-form-label">下單時間</label>
          <div class="col-sm-10">
            <input type="datetime" class="form-control" id="ord_time" value="<?= $ordrow["order_time"] ?>" disabled>
          </div>
        </div>
        <table class="table table-striped ord_table">
          <thead>
            <tr>
              <th scope="col">編號</th>
              <th scope="col">商品名稱</th>
              <th scope="col">單價</th>
              <th class="text-end">數量</th>
              <th class="text-end">小計</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            foreach ($prdrows as $prdrow) :
              //echo "<hr>";
              //var_dump($prdrow["prd_id"]);
              $prd_id = $prdrow["prd_id"];
              //var_dump($prd_id);
              $prd_amount = $prdrow["amount"];
              $prdlistsql = "SELECT prd_num, name, price FROM prd_list WHERE id =$prd_id";
              $prdlistresult = $conn->query($prdlistsql);
              $prdlistrow = $prdlistresult->fetch_assoc();

              // echo "prdlistrow" ;
              // echo "<br>" ;
              // var_dump($prdlistrows);
              // echo "<br>" ;


            ?>

              <tr>
                <td><?= $prdlistrow['prd_num'] ?></td>
                <td><?= $prdlistrow['name'] ?></td>
                <td><?= '$' . $prdlistrow['price'] ?></td>
                <td class="text-end"><?= $prd_amount ?></td>
                <td class="text-end"><?= '$' . $prdlistrow['price'] * $prd_amount ?></td>
                <?php $total += $prdlistrow['price'] * $prd_amount ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <td class="text-end" colspan="5">
                總計: $<?= $total ?>
              </td>
            </tr>
          </tfoot>
        </table>




        </from>


        <?php require("../../component/footerLayout.php") ?>
</body>

</html>