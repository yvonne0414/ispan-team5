<?php
require("../../db-connect.php");
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
  <title>INJOIN 註冊</title>
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
  
      <form action="./api/do-sign-up.php" method="post" class="mx-auto">
        <input type="number" name="role" class="d-none" value="2">
        <div class="row mb-3">
          <label for="name" class="col-sm-3 col-form-label">姓名</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="name" name="name">
          </div>
        </div>
        <fieldset class="row mb-3">
          <legend class="col-form-label col-sm-3 pt-0">性別</legend>
          <div class="col-sm-9 d-flex">
            <div class="form-check d-flex">
              <input class="form-check-input" type="radio" name="sexRadios" id="sexRadios1" value="M" checked>
              <label class="form-check-label ms-3" for="sexRadios1">
                男
              </label>
            </div>
            <div class="form-check d-flex ms-5">
              <input class="form-check-input" type="radio" name="sexRadios" id="sexRadios2" value="F">
              <label class="form-check-label ms-3" for="sexRadios2">
                女
              </label>
            </div>
          </div>
        </fieldset>
        <div class="row mb-3">
          <label for="age" class="col-sm-3 col-form-label">年齡</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="age" name="age">
          </div>
        </div>
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
        <div class="row mb-3">
          <label for="repassword" class="col-sm-3 col-form-label">再次確認密碼</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="repassword" name="repassword">
          </div>
        </div>
        <div class="row mb-3">
          <label for="phone" class="col-sm-3 col-form-label">手機號碼</label>
          <div class="col-sm-9">
            <input type="tel" class="form-control" id="phone" name="phone">
          </div>
        </div>
        <div class="row mb-3">
          <label for="address" class="col-sm-3 col-form-label">地址</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="address" name="address">
          </div>
        </div>
        
        <div class="mb-4">
            <a href="./user-sign-in.php" class="btn btn-outline-light mt-4 px-4">已有帳號</a>
            <button type="submit" class="btn btn-dark mt-4 px-4">註冊</button>
        </div>
      </form>
    </div>
    
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>