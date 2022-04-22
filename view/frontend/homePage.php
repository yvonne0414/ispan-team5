<?php
require("../../db-connect.php");
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
  <style>
    body{
      background-color: #454645;
      color:#fff;
    }
  </style>
</head>
<body>
  <div class="container">
    HOME
    <a href="./api/user-logout.php">登出</a>
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>