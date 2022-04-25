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
  <title>揪團趣</title>
  <?php require("../../component/headerLayout.php")?>
  <style>
    .title{
      white-space: nowrap; 
      width: 25rem; 
      text-overflow: ellipsis;
      overflow:hidden;
    }
    .owner{
      white-space: nowrap; 
      width: 8rem; 
      text-overflow: ellipsis;
      overflow:hidden;
    }
  </style>
</head>
<body>
  <?php require("../../component/header.php")?>
  <?php require("../../component/sidemenu.php")?>
  <div class="container pt-5">
    <h2 class="mt-3 mb-0" >官方活動</h2>

    <div class="d-flex justify-content-end align-items-center">
      <div>
        <a class="btn btn-outline-dark mb-3" href="group-info.php">新增活動</a>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr class="table-dark">
          <td></td>
          <td>活動名稱</td>
          <td>主辦人</td>
          <td>狀態</td>
          <td>開團時間</td>
          <td>結團時間</td>
          <td class="text-end">功能列</td>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql="SELECT * FROM group_list WHERE status!=7 AND is_official=1 ORDER BY start_time DESC";
          $result = $conn->query($sql);
          $rows = $result->fetch_all(MYSQLI_ASSOC);

          
          
          
          for($i=0; $i<count($rows); $i++):
            $row= $rows[$i];

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
            $start=$row["start_time"];
            $start=strtotime($start);
            $start=date('Y-m-d', $start);
          
            $end=$row["end_time"];
            $end=strtotime($end);
            $end=date('Y-m-d', $end);
        ?>
          <tr>
            <!-- 序號 -->
            <td class="text-end"><?= $i+1 ?></td> 
            <!-- 活動名稱 -->
            <td class="title"><?= $row['name'] ?></td>
            <!-- 主辦人 -->
            <td class="owner"><?= $username ?></td>
            <!-- 狀態 -->
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
            <!-- 開團時間 -->
            <td><?= $start ?></td>
            <!-- 結團時間 -->
            <td><?= $end ?></td>
            <td class="text-end">
              <a class="px-2" href="group-info-update.php?id=<?=$row['id']?>"><i class="fa-solid fa-pen"></i></a>
              <?php 
                if(
                $rows[$i]["status"]==1 ||
                $rows[$i]["status"]==3 ||
                $rows[$i]["status"]==6
                ):
              ?> 
              <a class="px-2" href="/ispan-team5/api/group/grp-doDelete.php?id=<?=$row['id']?>" onclick='return delclick();'><i class="fa-solid fa-trash-can"></i></a>
              <?php endif;?>
            </td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>

  </div>

    <div class="container mt-5">
    <h2 class="mt-3 mb-3" >私人活動</h2>

    <table class="table table-striped">
      <thead>
        <tr class="table-dark">
          <td></td>
          <td>活動名稱</td>
          <td>主辦人</td>
          <td>狀態</td>
          <td>開團時間</td>
          <td>結團時間</td>
          <td class="text-end">功能列</td>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql="SELECT * FROM group_list WHERE status!=7 AND is_official=2 ORDER BY start_time DESC";
          $result = $conn->query($sql);
          $rows = $result->fetch_all(MYSQLI_ASSOC);

          for($i=0; $i<count($rows); $i++):
            $row= $rows[$i];

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
            $start=$row["start_time"];
            $start=strtotime($start);
            $start=date('Y-m-d', $start);
          
            $end=$row["end_time"];
            $end=strtotime($end);
            $end=date('Y-m-d', $end);
        ?>
          <tr>
            <!-- 序號 -->
            <td class="text-end"><?= $i+1 ?></td> 
            <!-- 活動名稱 -->
            <td class="title"><?= $row['name'] ?></td>
            <!-- 主辦人 -->
            <td class="owner"><?= $username ?></td>
            <!-- 狀態 -->
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
            <!-- 開團時間 -->
            <td><?= $start ?></td>
            <!-- 結團時間 -->
            <td><?= $end ?></td>
            <td class="text-end">
              <a class="px-2" href="group-view.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-eye"></i></a>
            </td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>

  </div>

  <?php require("../../component/footerLayout.php")?>
  
  <script type="text/javascript">
    function delclick(event){
      if(confirm("確定要刪除此項活動嗎？")){
        return true;

      }else{
        return false;
      }
    }
  </script>
</body>
</html>