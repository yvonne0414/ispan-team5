<?php
require("../../db-connect.php");
// 驗證是否登入
session_start();
if(!isset($_SESSION["user"])){
    echo "<script>alert('請先登入！')</script>";
    echo "<script>location.href='/ispan-team5/view/frontend/user-sign-in.php';</script>";
    // header("location: /ispan-team5/view/frontend/user-sign-in.php");
}

$now=date('Y-m-d');
$user=$_SESSION["user"];
$user_id = $user['id'];

$sql="SELECT user_coupon.id AS user_coupon_id, coupon_list.* FROM user_coupon
JOIN coupon_list ON user_coupon.coupon_id = coupon_list.id 
WHERE user_id=$user_id AND  start_time<='$now 'AND  end_time>'$now '
";
$resualt=$conn->query($sql);
$rows=$resualt->fetch_All(MYSQLI_ASSOC);
// var_dump($rows);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>我的優惠券</title>
  <?php require("../component/headerLayout.php")?>
  <link rel="stylesheet" href="./component/fend.css">
  <style>
    
  </style>
</head>
<body>
  <?php require("./component/header.php")?>

  <div class="container py-5">
    <h1>我的優惠券</h1>

    <table class="table table-striped table-dark mt-3">
      <thead>
        <tr>
          <th></th>
          <th>優惠名稱</th>
          <th>低消</th>
          <th>最高折抵</th>
          <th>使用期限</th>
        </tr>
      </thead>
      <tbody>
        <?php
        for($i=0; $i<count($rows); $i++):
          $row=$rows[$i];
        ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?=$row['name']?></td>
          <td>$ <?=$row['rule_min']?></td>
          <td>$ <?=$row['rule_max']?></td>
          <td><?=$row['start_time']?> ~ <?=$row['end_time']?></td>
        </tr>
        <?php endfor;?>
      </tbody>
    </table>
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>