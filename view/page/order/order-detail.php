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
  <title>訂單詳細資訊</title>
  <?php require("../../component/headerLayout.php") ?>
</head>

<body>
  <?php require("../../component/header.php") ?>
  <?php require("../../component/sidemenu.php") ?>
  <div class="container py-5">
    <div>
      <a class="btn btn-primary" href="order-list.php">返回列表</a>
    </div>
    <div class="container py-5">
      <form>
        <div class="row mb-3">
          <label for="order_id" class="col-sm-2 col-form-label">訂單編號</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="order_id" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="prd_id" class="col-sm-2 col-form-label">訂購者</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="prd_id" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="phone" class="col-sm-2 col-form-label">電話</label></label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" id="phone" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="address" class="col-sm-2 col-form-label">地址</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="address" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="ord_state" class="col-sm-2 col-form-label">訂單狀態</label>
          <div class="col-sm-10">
            <input class="form-control" id="ord_state" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <label for="ord_time" class="col-sm-2 col-form-label">下單時間</label>
          <div class="col-sm-10">
            <input type="datetime" class="form-control" id="ord_time" disabled>
          </div>
        </div>
        <table class="table table-striped ord_table">
          <thead>
            <tr>
              <th scope="col">商品編號</th>
              <th scope="col">商品名稱</th>
              <th scope="col">單價</th>
              <th scope="col">數量</th>
              <th scope="col">小計</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td class="text-end" colspan="5">
                總計: 1000
              </td>
            </tr>
          </tfoot>
        </table>




        </from>


        <?php require("../../component/footerLayout.php") ?>
</body>

</html>