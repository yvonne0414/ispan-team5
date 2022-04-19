<?php
require("../../../db-connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>揪團趣</title>
  <?php require("../../component/headerLayout.php")?>
</head>
<body>
  <?php require("../../component/header.php")?>
  <?php require("../../component/sidemenu.php")?>
  <div class="container">
    <h2>官方活動</h2>

    <div class="d-flex justify-content-end align-items-center">
      <div>
        <a class="btn btn-primary mb-3" href="">新增活動</a>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr class="table-dark">
          <td>活動序號</td>
          <td>活動名稱</td>
          <td>主揪人</td>
          <td>狀態</td>
          <td>開團時間</td>
          <td>結團時間</td>
          <td class="text-end">功能列</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>001</td>
          <td>
            揪品酒 high high
          </td>
          <td>Jone</td>
          <td>開團中</td>
          <td>
            2022/04/15
          </td>
          <td>
            2022/04/22
          </td>
          <td class="text-end">
            <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
            <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
          </td>
        </tr>
        <tr>
        <td>002</td>
          <td>
            我有故事你有酒嗎?
          </td>
          <td>Nabi</td>
          <td>開團中</td>
          <td>
            2022/04/18
          </td>
          <td>
            2022/04/30
          </td>
          <td class="text-end">
            <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
            <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
          </td>
        </tr>
      </tbody>
    </table>

  </div>

  <?php require("../../component/footerLayout.php")?>
</body>
</html>