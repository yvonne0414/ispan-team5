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
    <title></title>
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

        <form action="../../../api/group/grp-doUpdate.php?id=<?=$id?>" method="post" class="d-flex flex-wrap mt-4">
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="name" class="form-label mb-0">活動名稱</label>
                </div>
                <div class="flex-grow-1">
                <input type="text"  class="form-control" name="name" id="name">
                </div>
            </div>
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                <label for="disc" class="form-label mb-0">活動描述</label>
                </div>
                <div  class="flex-grow-1">
                <textarea class="form-control" name="disc" id="disc" rows="3"></textarea>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="user_id" class="form-label mb-0">主辦人</label>
                </div>
                <div class="flex-grow-1">
                <input type="text"  class="form-control" name="user_id" id="user_id">
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="vip_level" class="form-label mb-0">VIP等級</label>
                </div>
                <div class="flex-grow-1">
                <select class="form-select" name="vip_level" id="vip_level">
                    <option value="2" selected>銅卡</option>
                    <option value="3">銀卡</option>
                    <option value="4">金卡</option>
                </select>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="price" class="form-label mb-0">參加費用</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="price" id="price">
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                <label for="pass_num" class="form-label mb-0">成團人數</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="pass_num" id="pass_num">
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                <label for="max_num" class="form-label mb-0">人數上限</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="max_num" id="max_num">
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                <label for="is_official" class="form-label mb-0">活動類型</label>
                </div>
                <div class="flex-grow-1">
                <input  class="form-control" name="is_official" id="is_official" disabled value="官方">
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                
                    <div>
                    <label for="start_time" class="form-label mb-0">開團日期</label>
                    
                    <input class="mt-3" type="date" name="start_time">
                    </div>
                
                    <br>
                    <div>
                    <label for="end_time" class="form-label mb-0">結束日期</label>
            
                    <input class="mt-3" type="date" name="end_time">
                    </div>    
                
                    <br>
                    <div>
                    <label for="activity_start_time" class="form-label mb-0">活動日期</label>
                    
                    <input class="mt-3 mb-5" type="date" name="activity_start_time">
                    </div>    
                
                    
                </div>
            </div>
            <div class="w-100 text-center">
                <button class="btn btn-outline-primary">取消</button>
                <button class="btn btn-primary"  type="submit" id="group-submit">送出表單</button>
            </div>
            </div>
        </form>
<?php require("../../component/footerLayout.php")?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

</script>
</body>
</html>