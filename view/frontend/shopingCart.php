<?php
require("../../db-connect.php");
// 驗證是否登入
session_start();
if(!isset($_SESSION["user"])){
    echo "<script>alert('請先登入！')</script>";
    echo "<script>location.href='/ispan-team5/view/frontend/user-sign-in.php';</script>";
    // header("location: /ispan-team5/view/frontend/user-sign-in.php");
}
$user=$_SESSION["user"];
$user_id = $user['id'];


$data=[
    'user_id'=>$user_id,
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
  <style>
    .form-control, .form-control:focus {
      background-color: #ffffff80;
      width: auto;
    }
  </style>
</head>
<body>
  <?php require("./component/header.php")?>

  <div class="container py-5">
    <h1>確認訂單</h1>

    <form action="./api/add-order.php" method="post">
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
            <th >商品編號</th>
            <th >商品名稱</th>
            <th >單價</th>
            <th  class="text-end">數量</th>
            <th  class="text-end">小計</th>
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
            <td  class="text-end"><?= $prd_amount?></td>
            <td class="text-end"><?= '$'.$rowprd['price']*$prd_amount?></td>
            <?php $total+=$rowprd['price']*$prd_amount?>
          </tr>
          <?php  endfor; ?>
        </tbody>
        <tfoot>
          <tr>
            <td>使用優惠券</td>
            <td colspan="2">
              <select  class="form-control" name="choose_coupon" id="choose_coupon">
                <option value="-1">請選擇</option>
                <?php
                  $now=date('Y-m-d');

                  $sql="SELECT user_coupon.id AS user_coupon_id, coupon_list.* FROM user_coupon
                  JOIN coupon_list ON user_coupon.coupon_id = coupon_list.id 
                  WHERE user_id=$user_id AND  start_time<='$now' AND  end_time>'$now' AND rule_min < $total
                  ";
                  $resualt=$conn->query($sql);
                  $rows=$resualt->fetch_All(MYSQLI_ASSOC);
                  foreach($rows as $row):
                    
                ?>
                  <option value=<?=$row['user_coupon_id']?>><?=$row['name']?></option>
                <?php endforeach;?>
              </select>
            </td>
            <td colspan="2" class="text-end" id="coupon-price">
              -
            </td>
          </tr>
          <tr>
            <td class="text-end" colspan="5">
              總計: $<span id="total"></span>
            </td>
          </tr>
        </tfoot>
      </table>


      <div class="text-end mt-4">
        <button type="submit" class="btn btn-outline-light">確定下單</button>
      </div>

    </from>


    
  </div>

  <?php require("../component/footerLayout.php")?>

  <script>
    let chooseCoupon = document.querySelector("#choose_coupon");
    let couponPrice = document.querySelector("#coupon-price");
    let chooseCouponVal = chooseCoupon.value
    let discount=0;
    let totalNode = document.querySelector('#total')
    <?php
      echo "let total = $total";
    ?>
    
    totalNode.innerHTML = total


    chooseCoupon.addEventListener('change', function(){
      chooseCouponVal = chooseCoupon.value
      if(chooseCouponVal>0){
        $.ajax({
          method: "POST",
          url: "./api/get-coupon-price.php",
          dataType: "json",
          data: {
            user_coupon_id: chooseCouponVal
          }
        })
        .done(function(response) {
          console.log(response)
          couponPrice.innerHTML = `-$${response['discount']}`
          discount = response['discount']
          totalNode.innerHTML = total-discount
        }).fail(function(jqXHR, textStatus) {
          console.log("Request failed: " + textStatus);
        });

      }else{
        couponPrice.innerHTML = '-'
        totalNode.innerHTML = total
      }

    })
    
  </script>
</body>
</html>