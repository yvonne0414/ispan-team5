<?php
session_start();
require("../../db-connect.php");
if(!isset($_SESSION["user"])){
    header("location: ./user-sign-in.php");
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
  
  <div class="container">
    HOME
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>