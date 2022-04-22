<?php
require("../../db-connect.php");


$data=[
    'user_id'=>3,
    "prd_content"=>[
      [
        "id"=>1,
        "amount"=>2
      ],
      [
        "id"=>2,
        "amount"=>4
      ],
      [
        "id"=>3,
        "amount"=>4
      ]
    ]
];

// 訂購人資訊
$id=$data["user_id"];
$sql="SELECT * FROM user_list WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// var_dump($row);




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>確認訂單</title>
  <?php require("../component/headerLayout.php")?>
  <link rel="stylesheet" href="./component/fend.css">
</head>
<body>
  <?php require("./component/header.php")?>

  <div class="container py-5">
    <h1>確認訂單</h1>

    <form>
      <div class="w-50">
        <div class="row mb-3">
          <label for="prd_id" class="col-sm-2 col-form-label  py-2">訂購者</label>
          <div class="col-sm-10">
            <!-- <input type="text" class="form-control" id="prd_id" disabled> -->
            <div class="py-2"><?=$row['name']?></div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="phone" class="col-sm-2 col-form-label  py-2">電話</label></label>
          <div class="col-sm-10">
            <!-- <input type="tel" class="form-control" id="phone" disabled> -->
            <div class="py-2"><?=$row['phone']?></div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="address" class="col-sm-2 col-form-label  py-2">地址</label>
          <div class="col-sm-10">
            <!-- <input type="text" class="form-control" id="address" disabled> -->
            <div class="py-2"><?=$row['address']?></div>
          </div>
        </div>
      </div>
      
      <table class="table table-striped table-dark">
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
          <?php
          // 訂單商品
          $prd_content=$data['prd_content'];
          $total=0;
          for($i=0; $i<count($data['prd_content']); $i++):
            $prd_id=$prd_content[$i]['id'];
            $prd_amount=$prd_content[$i]['amount'];
            $sqlprd="SELECT * FROM prd_list WHERE id=$prd_id";
            $resultprd = $conn->query($sqlprd);
            $rowprd = $resultprd->fetch_assoc();
          ?>
          <tr>
            <td><?= $rowprd['prd_num']?></td>
            <td><?= $rowprd['name']?></td>
            <td><?= '$'.$rowprd['price']?></td>
            <td><?= $prd_amount?></td>
            <td class="text-end"><?= '$'.$rowprd['price']*$prd_amount?></td>
            <?php $total+=$rowprd['price']*$prd_amount?>
          </tr>
          <?php  endfor; ?>
        </tbody>
        <tfoot>
          <tr>
            <td class="text-end" colspan="5">
              總計: $<?=$total?>
            </td>
          </tr>
        </tfoot>
      </table>


      <div class="text-end mt-4">
        <a class="btn btn-outline-light" href="./api/add-order.php">確定下單</a>
    </div>

    </from>


    
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>