<?php
require("../../../db-connect.php");

session_start();
$user=$_SESSION['user'];

$id=$_GET['id'];
$sql="SELECT * FROM group_list WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


$sql_2="SELECT * FROM group_official WHERE group_id='$id'";
$result2 = $conn->query($sql_2);
$row2 = $result2->fetch_assoc();




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
        $start=date('Y-m-d', $start);

        $end=$row["end_time"];
        $end=strtotime($end);
        $end=date('Y-m-d', $end);

        $activity_start=$row["activity_start_time"];
        $activity_start=strtotime($activity_start);
        $activity_start=date('Y-m-d', $activity_start);
        
        ?>
        <h2>編輯活動</h2>

        <form action="/ispan-team5/api/group/grp-doUpdate.php?id=<?=$id?>" method="post" class="d-flex flex-wrap mt-4">
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="name" class="form-label mb-0">活動名稱</label>
                </div>
                <div class="flex-grow-1">
                <input type="text"  class="form-control" name="name" id="name" value='<?=$row['name']?>'>
                </div>
            </div>
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                <label for="disc" class="form-label mb-0">活動描述</label>
                </div>
                <div  class="flex-grow-1">
                <textarea class="form-control" name="disc" id="disc" rows="3" value='<?=$row["disc"]?>' ><?=$row["disc"]?></textarea>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
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
                <input type="text"  class="form-control" name="user_id" id="user_id" value='<?=$ownerrow["name"]?>' disabled>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="is_official" class="form-label mb-0">活動類型</label>
                </div>
                <div class="flex-grow-1">
                <input  class="form-control" name="is_official" id="is_official" disabled value="官方">
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="vip_level" class="form-label mb-0">參加門檻</label>
                </div>
                <div class="flex-grow-1">
                <select class="form-select" name="vip_level" id="vip_level" >
                    <?php
                    $vipsql="SELECT * FROM vip_level WHERE id!=1";
                    $viprs=$conn->query($vipsql);
                    $viprows=$viprs->fetch_all(MYSQLI_ASSOC);
                    // var_dump($viprows);

                    $vipSelected = $row2["vip_level"];
                    foreach($viprows as $viprow){
                        $viprowVal=$viprow['id'];
                        $viprowname=$viprow['name'];

                        if($vipSelected == $viprowVal){
                            echo "<option value='$viprowVal' selected>$viprowname</option>";
                        }else{
                            echo "<option value='$viprowVal'>$viprowname</option>";
                        }

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
                <input type="number" min="0" class="form-control" name="price" id="price" value='<?=$row2["price"]?>' >
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="pass_num" class="form-label mb-0">成團人數</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="pass_num" id="pass_num" value='<?=$row["pass_num"]?>'>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                <label for="max_num" class="form-label mb-0">人數上限</label>
                </div>
                <div class="flex-grow-1">
                <input type="number" min="0" class="form-control" name="max_num" id="max_num" value='<?=$row["max_num"]?>'>
                </div>
            </div>
            
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                    <label for="start_time" class="form-label mb-0">開團日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="date" name="start_time" value='<?=$start?>' >
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                    <label for="end_time" class="form-label mb-0">結束日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="date" name="end_time" value='<?=$end?>'>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                    <label for="activity_start_time" class="form-label mb-0">活動日期</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" type="date" name="activity_start_time" value='<?=$activity_start?>' >
                </div>
            </div>
            <div class="w-100 text-center mt-4">
                <a class="btn btn-outline-dark" href="groupList.php">返回列表</a>
                <button class="btn btn-dark"  type="submit" id="group-submit">確定</button>
            </div>
            </div>
        </form>
<?php require("../../component/footerLayout.php")?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>