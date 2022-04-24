<?php
require("../../db-connect.php");
// 驗證是否登入
session_start();
if(!isset($_SESSION["user"])){
    echo "<script>alert('請先登入！')</script>";
    echo "<script>location.href='/ispan-team5/view/frontend/user-sign-in.php';</script>";
    // header("location: /ispan-team5/view/frontend/user-sign-in.php");
}
$user=$_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>揪團趣-來揪團</title>
  <?php require("../component/headerLayout.php")?>
  <link rel="stylesheet" href="./component/fend.css">
  <style>
    .form-label{
        width: 100px;
    }
    .form-control, .form-control:focus {
        background-color: #ffffff80;
    }
  </style>
</head>
<body>
  <?php require("./component/header.php")?>
  <div class="container py-5">
    <h1>來揪團</h1>

    <form action="./api/add-user-group.php" method="post" class="d-flex flex-wrap mt-4">
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
          <div>
          <label for="name" class="form-label mb-0">活動名稱</label>
          </div>
          <div class="flex-grow-1">
          <input type="text"  class="form-control" name="name" id="name" required>
          </div>
      </div>
      <div class="d-flex align-items-center w-100 pe-4 mb-3">
          <div>
          <label for="disc" class="form-label mb-0">活動描述</label>
          </div>
          <div  class="flex-grow-1">
          <textarea class="form-control" name="disc" id="disc" rows="3" require></textarea>
          </div>
      </div>
      <!-- 主辦人、 類型自動帶入 -->
      <input type="hidden"  class="form-control" name="user_id" id="user_id" value="<?=$user['id']?>">
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
          <div>
          <label for="pass_num" class="form-label mb-0">成團人數</label>
          </div>
          <div class="flex-grow-1">
          <input type="number" min="0" class="form-control" name="pass_num" id="pass_num">
          </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
          <div>
          <label for="max_num" class="form-label mb-0">人數上限</label>
          </div>
          <div class="flex-grow-1">
          <input type="number" min="0" class="form-control" name="max_num" id="max_num">
          </div>
      </div>
      
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
          <div>
              <label for="start_time" class="form-label mb-0">開團日期</label>
          </div>
          <div class="flex-grow-1">
              <input class="form-control" type="datetime-local" name="start_time">
          </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
          <div>
              <label for="end_time" class="form-label mb-0">截止日期</label>
          </div>
          <div class="flex-grow-1">
              <input class="form-control" type="datetime-local" name="end_time">
          </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
          <div>
              <label for="activity_start_time" class="form-label mb-0">活動日期</label>
          </div>
          <div class="flex-grow-1">
              <input class="form-control" type="datetime-local" name="activity_start_time">
          </div>
      </div>
      
      <div class="w-100 text-center mt-4">
      <a class="btn btn-outline-light" href="groupList.php">取消</a>
          <button class="btn btn-dark"  type="submit" id="group-submit">送出表單</button>
      </div>
      </div>
    </form>
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>