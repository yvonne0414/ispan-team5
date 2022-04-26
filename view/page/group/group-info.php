<?php
require("../../../db-connect.php");
session_start();
// var_dump($_SESSION);
$user=$_SESSION['user'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../component/headerLayout.php">
    <title>新增活動</title>
    <?php require("../../component/headerLayout.php")?>
    <style>
    .form-label{
      width: 100px;
    }
    
  </style>

</head>

    <body>
        <?php require("../../component/header.php")?>
        <?php require("../../component/sidemenu.php")?>
        <div class="container py-5">

        <h2>新增活動</h2>

        <form action="../../../api/group/add-group.php" method="post" class="d-flex flex-wrap mt-4">
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
                <textarea class="form-control" name="disc" id="disc" rows="3" required></textarea>
                </div>
            </div>
            <!-- 主辦人、 類型自動帶入 -->
            <input type="hidden"  class="form-control" name="user_id" id="user_id" value="<?=$user['id']?>">
            <input type="hidden"  class="form-control" name="is_official" id="is_official" disabled value="官方">

            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="vip_level" class="form-label mb-0">參加門檻</label>
                </div>
                <div class="flex-grow-1">
                <select class="form-select" name="vip_level" id="vip_level" required>
                    <?php
                    $vipsql="SELECT * FROM vip_level WHERE id!=1";
                    $viprs=$conn->query($vipsql);
                    $viprows=$viprs->fetch_all(MYSQLI_ASSOC);
                    // var_dump($viprows);

                    foreach($viprows as $viprow){
                        $viprowVal=$viprow['id'];
                        $viprowname=$viprow['name'];
                        echo "<option value='$viprowVal'>$viprowname</option>";

                    }
                    ?>
                </select>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="price" class="form-label mb-0">參加費用</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="price" id="price" required>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="pass_num" class="form-label mb-0">成團人數</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="pass_num" id="pass_num" required>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="max_num" class="form-label mb-0">人數上限</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="max_num" id="max_num" required>
                </div>
            </div>
            
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                    <label for="start_time" class="form-label mb-0">開團日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="date" name="start_time" required>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                    <label for="end_time" class="form-label mb-0">結束日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="date" name="end_time" required>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                    <label for="activity_start_time" class="form-label mb-0">活動日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="date" name="activity_start_time" required>
                </div>
            </div>
            
            <div class="w-100 text-center mt-4">
            <a class="btn btn-outline-dark" href="groupList.php">取消</a>
                <button class="btn btn-dark"  type="submit" id="group-submit">送出表單</button>
            </div>
            </div>
        </form>
<?php require("../../component/footerLayout.php")?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

</script>
</body>
</html>