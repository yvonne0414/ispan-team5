<?php
require("../../db-connect.php");
// 驗證是否登入
session_start();
if(!isset($_SESSION["user"])){
    echo "<script>alert('請先登入！')</script>";
    echo "<script>location.href='/ispan-team5/view/frontend/user-sign-in.php';</script>";
    // header("location: /ispan-team5/view/frontend/user-sign-in.php");
}

$sql="SELECT * FROM bartd_list";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
// var_dump($rows);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>酒譜</title>
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
      width: 12rem;
      height: 12rem;
      overflow:hidden;
    }
    td img{
      object-fit:cover;
      width: 12rem;
      height: 12rem;
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
    <h1>酒譜</h1>
    <div class="card text-center card-bg">
      <div class="card-header">
        
      </div>
      <div class="card-body d-flex justify-content-start align-items-center flex-wrap">

        <?php foreach($rows as $row):?>

          <div class="card bg-dark mx-3 mb-3" style="width: 12rem;">
            <div class="card-img-wrapper">
              <img src="../../assets/img/test/<?=$row["img"]?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body pt-0">
              <a href="#" class="btn  stretched-link"></a>

              <h5 class="card-title"><?=$row["name"]?></h5>
            </div>
          </div>



        <?php endforeach;?>
        
      
      </div>
    </div>

    
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>