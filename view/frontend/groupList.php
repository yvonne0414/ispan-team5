<?php
require("../../db-connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>揪團趣</title>
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
    <h1>揪團趣</h1>

    <div class="text-end">
      <a href="./group-info-useradd.php" class="btn btn-outline-light">
        我要來揪團
      </a>
    </div>

    <div class="mt-4">
      <div>
        <h3 class="fw-lighter"><span class="logo-text text-white">INJOIN</span> 近期活動</h3>

        <table class="table table-striped table-dark mt-3">
          <thead>
            <tr>
              <th>
                活動名稱
              </th>
              <th>
                參加費用
              </th>
              <th>
                活動狀態
              </th>
              <th>
                報名截止
              </th>
              <th>
                活動日期
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql="SELECT * FROM group_list WHERE is_official=1 AND status!=1 AND status!=7 ";
              $rs=$conn->query($sql);
              $rows=$rs->fetch_all(MYSQLI_ASSOC);
              
              foreach($rows as $row):
                $group_id=$row['id'];
                $officialsql="SELECT * FROM group_official WHERE group_id=$group_id";
                $officialrs=$conn->query($officialsql);
                $officialrow=$officialrs->fetch_assoc();

                //抓每列狀態
                $status_id=(int)$row['status'];
                $statussql="SELECT status_name FROM group_status WHERE id='$status_id'";
                $statusresult = $conn->query($statussql);
                $status = $statusresult->fetch_assoc();
                $status = $status['status_name'];

                //修改日期顯示型態
                $end=$row["end_time"];
                $end=strtotime($end);
                $end=date('Y-m-d', $end);

                $activity=$row["activity_start_time"];
                $activity=strtotime($activity);
                $activity=date('Y-m-d', $activity);
            ?>
            <tr>
              <td>
                <?=$row["name"]?>
              </td>
              <td>
                <?=$officialrow["price"]?> 元
              </td>
              <td>
                <span class="text-white p-1 rounded-2 
                  <?php 
                  echo
                  ($status_id==2 ? "bg-primary" : 
                  ($status_id==3 ? "bg-warning" : 
                  ($status_id==4 ? "bg-success" : "bg-secondary"))) 
                  ?> 
                ">
                  <?= $status?>
                </span>
              </td>
              <td>
                <?= $end?>
              </td>
              <td>
                <?= $activity?>
              </td>
              <td class="text-end">
                <a class="btn btn-outline-light" href="">看看詳情</a>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>

      <div class="mt-5">
        <h3 class="fw-lighter">揪團中</h3>

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
              $sql="SELECT * FROM group_list WHERE is_official=2 AND status!=1 AND status!=7 ";
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
                  ($status_id==3 ? "bg-warning" : 
                  ($status_id==4 ? "bg-success" : "bg-secondary")))) 
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


    
  </div>

  <?php require("../component/footerLayout.php")?>

</body>
</html>