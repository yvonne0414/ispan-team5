<?php
require("../../db-connect.php");
// 驗證是否登入
session_start();
if(!isset($_SESSION["user"])){
    echo "<script>alert('請先登入！')</script>";
    echo "<script>location.href='/ispan-team5/view/frontend/user-sign-in.php';</script>";
    // header("location: /ispan-team5/view/frontend/user-sign-in.php");
}

if(isset($_GET['cate'])){
  $cate= $_GET['cate'];
  $sql="SELECT id, name, main_img, price, status, category FROM prd_list WHERE status=1 AND category=$cate";
  $result=$conn->query($sql);
  $rows=$result->fetch_all(MYSQLI_ASSOC);

}else{
  $sql="SELECT id, name, main_img, price, status FROM prd_list WHERE status=1";
  $result=$conn->query($sql);
  $rows=$result->fetch_all(MYSQLI_ASSOC);
  // var_dump($rows);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>商品</title>
  <?php require("../component/headerLayout.php")?>
  <link rel="stylesheet" href="./component/fend.css">
  <style>
    .card-bg{
      background-color: #ffffff90;
    }
    .stretched-link{
      color:transparent;
      background-color:transparent;
    }
    .card-img-wrapper{
      height: 230px;
      overflow:hidden;
      display: flex;
      align-items: center;
      background: #000;
    }
    .card-img-wrapper img{
      object-fit:contain;
      max-height: 230px;
      max-width: 230px;
      margin: auto;
    }
    .card-title{
      white-space: nowrap; 
      width: 10rem; 
      text-overflow: ellipsis;
      overflow:hidden;
    }
  </style>
</head>
<body>
  <?php require("./component/header.php")?>

  <div class="container py-5">
    <h1>商品</h1>
    <div class="card text-center card-bg">
      <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            <a class="nav-link <?= (!isset($_GET['cate']))? "active":"" ?> " href="prd-list.php">全部商品</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['cate'])): ?><?= $_GET['cate']==1? "active":""?><?php endif;?> " href="prd-list.php?cate=1">基酒</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['cate'])): ?><?= $_GET['cate']==2? "active":""?><?php endif;?>" href="prd-list.php?cate=2">副材料</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['cate'])): ?><?= $_GET['cate']==3? "active":""?><?php endif;?>" href="prd-list.php?cate=3">工具</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['cate'])): ?><?= $_GET['cate']==4? "active":""?><?php endif;?>" href="prd-list.php?cate=4">杯具</a>
          </li>
        </ul>
      </div>
      <div class="card-body d-flex justify-content-start align-items-center flex-wrap">

        <?php foreach($rows as $row):?>

          <div class="card bg-dark mx-3 mb-3" style="width: 12rem;">
            <div class="card-img-wrapper">
              <img src="../../assets/img/test/<?=$row["main_img"]?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body pt-0">
              <a href="#" class="btn  stretched-link"></a>

              <h5 class="card-title"><?=$row["name"]?></h5>
              <p class="card-text mb-0 fw-light">$<?=$row["price"]?></p>
            </div>
          </div>



        <?php endforeach;?>
        
      
      </div>
    </div>

    
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>