<?php
require("../../db-connect.php");
// 驗證是否登入
session_start();
if(!isset($_SESSION["user"])){
    echo "<script>alert('請先登入！')</script>";
    echo "<script>location.href='/ispan-team5/view/frontend/user-sign-in.php';</script>";
    // header("location: /ispan-team5/view/frontend/user-sign-in.php");
}
$uesr_id=$_SESSION["user"]['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>我的揪團</title>
  <?php require("../component/headerLayout.php")?>
  <link rel="stylesheet" href="./component/fend.css">
  <style>
    tr td:first-child{
      width: 350px;
    }
    tr td:nth-child(2){
      width: 200px;
    }
  </style>
</head>
<body>
  <?php require("./component/header.php")?>

  <div class="container py-5">
    <h1>我的揪團</h1>
    <div class="text-end">
      <a href="./groupList.php" class="btn btn-outline-light me-3">
        回到活動列表
      </a>
      <a href="./group-info-useradd.php" class="btn btn-outline-light">
        我要來揪團
      </a>
    </div>
    <div class="mt-4">
        <table class="table table-striped table-dark mt-3">
          <thead>
            <tr>
              <th>
                活動名稱
              </th>
              <th>
                主揪人
              </th>
              <th>
                活動狀態
              </th>
              <th>
                報名截止
              </th>
              <th>
                活動時間
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql="SELECT * FROM group_list WHERE is_official=2 AND status!=7 AND user_id=$uesr_id  ORDER BY start_time DESC";
              $rs=$conn->query($sql);
              $rows=$rs->fetch_all(MYSQLI_ASSOC);
              
              foreach($rows as $row):
                //抓到每列顯示人名
                $user_id=$row['user_id'];
                $usersql="SELECT name FROM user_list WHERE id='$user_id'";
                $userresult = $conn->query($usersql);
                $user = $userresult->fetch_assoc();
                $username = $user['name'];

                //抓每列狀態
                $status_id=(int)$row['status'];
                $statussql="SELECT status_name FROM group_status WHERE id='$status_id'";
                $statusresult = $conn->query($statussql);
                $status = $statusresult->fetch_assoc();
                $status = $status['status_name'];

                //修改日期顯示型態
              
                $end=$row["end_time"];
                $endstor=strtotime($end);
                $end=date('Y-m-d', $endstor);
                $endTime=date('h:i a', $endstor);

                $activity=$row["activity_start_time"];
                $activitystor=strtotime($activity);
                $activity=date('Y-m-d', $activitystor);
                $activityTime=date('h:i a', $activitystor);
            ?>
            <tr>
              <td>
                <?=$row["name"]?>
              </td>
              <td>
                <?=$username?>
              </td>
              <td>
                <span class="text-white p-1 rounded-2 
                  <?php 
                  echo
                  ($status_id==1 ? "bg-dark" : 
                  ($status_id==2 ? "bg-primary" : 
                  ($status_id==3 ? "bg-secondary" : 
                  ($status_id==4 ? "bg-success" : 
                  ($status_id==5 ? "bg-warning" : "bg-secondary")))))
                  ?> 
                ">
                  <?= $status?>
                </span>
              </td>
              <td>
                <div><?= $end?></div>
                <div><?= $endTime?></div>
              </td>
              <td>
                <div><?= $activity?></div>
                <div><?= $activityTime?></div>
              </td>
              <td class="text-end">
                <a class="btn btn-outline-light" href="">看看詳情</a>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>


    
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>