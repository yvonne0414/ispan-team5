<?php
require("../../../db-connect.php");

session_start();
$user=$_SESSION['user'];

$id=$_GET['id'];
$sql="SELECT * FROM group_list WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../component/headerLayout.php">
    <title>揪團趣-私人查看</title>
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

        <?php
        // echo "row";
        // echo "<br>";
        // var_dump($row);
        // echo "<br>";
        // echo "row2";
        // echo "<br>";
        // var_dump($row2);
        // echo $row["end_time"];

        $start=$row["start_time"];
        $start=strtotime($start);
        // 使用Y-m-d\TH:i:s樣式才能顯示
        $start=date('Y-m-d\TH:i:s', $start);

        $end=$row["end_time"];
        $end=strtotime($end);
        $end=date('Y-m-d\TH:i:s', $end);
        

        $activity_start=$row["activity_start_time"];
        $activity_start=strtotime($activity_start);
        $activity_start=date('Y-m-d\TH:i:s', $activity_start);
        // var_dump($end);
        ?>
        <h2>查看活動</h2>

        <form class="d-flex flex-wrap mt-4">
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="name" class="form-label mb-0">活動名稱</label>
                </div>
                <div class="flex-grow-1">
                <input type="text"  class="form-control" name="name" id="name" disabled value='<?=$row['name']?>'>
                </div>
            </div>
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                <label for="disc" class="form-label mb-0">活動描述</label>
                </div>
                <div  class="flex-grow-1">
                <textarea class="form-control" name="disc" id="disc" rows="3" disabled value='<?=$row["disc"]?>' ><?=$row["disc"]?></textarea>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                <label for="user_id" class="form-label mb-0">主辦人</label>
                </div>
                <div class="flex-grow-1">
                <?php
                    $owner_id=$row["user_id"];
                    $ownersql="SELECT name FROM user_list WHERE id=$owner_id";
                    $ownerresualt=$conn->query($ownersql);
                    $ownerrow=$ownerresualt->fetch_assoc();
                
                ?>
                <input type="text"  class="form-control" name="user_id" id="user_id" disabled value='<?=$ownerrow["name"]?>'>
                </div>
            </div>

   
            <div class="d-flex align-items-center w-50 pe-4 mb-1">
                <div>
                <label for="pass_num" class="form-label mb-0">成團人數</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="pass_num" id="pass_num" disabled value='<?=$row["pass_num"]?>'>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="max_num" class="form-label mb-0">人數上限</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="max_num" id="max_num" disabled value='<?=$row["max_num"]?>'>
                </div>
            </div>
            
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                    <label for="start_time" class="form-label mb-0">開團日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="datetime-local" name="start_time" disabled value='<?=$start?>' >
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                    <label for="end_time" class="form-label mb-0">結束日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="datetime-local" name="end_time" disabled value='<?=$end?>'>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                    <label for="activity_start_time" class="form-label mb-0">活動日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="datetime-local" name="activity_start_time" disabled value='<?=$activity_start?>' >
                </div>
            </div>
            <div class="w-100 text-center mt-4">
                <a class="btn btn-outline-dark" href="groupList.php">返回列表</a>
            </div>
            </div>
        </form>
<?php require("../../component/footerLayout.php")?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>