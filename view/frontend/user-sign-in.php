<?php
session_start();
if(isset($_SESSION["user"])){
    header("location: ./homePage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>INJOIN 登入</title>
  <?php require("../component/headerLayout.php")?>
  <style>
    body{
      background-color: #454645;
      color:#fff;
    }
    form{
      max-width: 500px;
    }
    
    .form-control, .form-check-input {
      background-color: #ffffff80;
    }
    .col-form-label{
      text-align:right;
    }
  </style>
</head>
<body>
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="text-center w-100">
      <h1 class="logo-text my-5">INJOIN</h1>
      <?php if(isset($_SESSION["error"]["times"]) && $_SESSION["error"]["times"]>5): ?>
        <div class="text-center"> 您已嘗試超過允許的錯誤次數</div>
      <?php else: ?>
        <form action="./api/do-sign-in.php" method="post" class="mx-auto">
          <div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email">
            </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-sm-3 col-form-label">密碼</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password">
            </div>
          </div>
          <div class="py-2">
              <?php if(isset($_SESSION["error"])): ?>
                  <div class="text-danger"><?=$_SESSION["error"]["message"]?>,錯誤 <?=$_SESSION["error"]["times"] ?>次</div>
              <?php endif; ?>
          </div>
          <div class="mb-4">
              <a href="./user-sign-up.php" class="btn btn-outline-light mt-4 px-4 ">來去註冊</a>
              <button type="submit" class="btn btn-dark mt-4 px-4">登入</button>
          </div>
        </form>
      <?php endif; ?>
        
    </div>
    
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>