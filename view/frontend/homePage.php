<?php
// 驗證是否登入
session_start();
if(!isset($_SESSION["user"])){
    echo "<script>alert('請先登入！')</script>";
    echo "<script>location.href='/ispan-team5/view/frontend/user-sign-in.php';</script>";
    // header("location: /ispan-team5/view/frontend/user-sign-in.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>INJOIN 註冊</title>
  <?php require("../component/headerLayout.php")?>
  <link rel="stylesheet" href="./component/fend.css">
</head>
<body>
  <?php require("./component/header.php")?>
  
  <div class="container py-5">
    <h1>HOME</h1>
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>