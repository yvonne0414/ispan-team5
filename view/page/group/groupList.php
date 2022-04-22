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
 
</head>
<body>
  <?php require("../../component/header.php")?>
  <?php require("../../component/sidemenu.php")?>
  <div class="container">
    <h2 class="mt-3 mb-3" >官方活動</h2>

    <div class="d-flex justify-content-end align-items-center">
      <div>
        <a class="btn btn-primary mb-3" href="group-info.php">新增活動</a>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr class="table-dark">
          <td>活動序號</td>
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
          $sql="SELECT * FROM group_list WHERE status!=5";
          $result = $conn->query($sql);
          $rows = $result->fetch_all(MYSQLI_ASSOC);
          
          
          for($i=0; $i<count($rows); $i++):
            $row= $rows[$i];
            $start=$row["start_time"];
            $start=strtotime($start);
            $start=date('Y-m-d', $start);
          
            $end=$row["end_time"];
            $end=strtotime($end);
            $end=date('Y-m-d', $end);
        ?>
          <tr>
            <!-- 序號 -->
            <td><?= $i+1 ?></td> 
            <!-- 活動名稱 -->
            <td><?= $row['name'] ?></td>
            <!-- 主辦人 -->
            <td><?= $row['user_id'] ?></td>
            <!-- 狀態 -->
            <td><?= $row['status'] ?></td>
            <!-- 開團時間 -->
            <td><?= $start ?></td>
            <!-- 結團時間 -->
            <td><?= $end ?></td>
            <td class="text-end">
              <a class="px-2" href="group-info-update.php?id=<?=$row['id']?>"><i class="fa-solid fa-pen"></i></a>
              <a class="px-2" href="/ispan-team5/api/group/grp-doDelete.php?id=<?=$row['id']?>"><i class="fa-solid fa-trash-can"></i></a>
            </td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>

  </div>
  <div class="container">
    <h2 class="mt-5 mb-3">私人活動</h2>

    

    <table class="table table-striped">
      <thead>
        <tr class="table-dark">
          <td>活動序號</td>
          <td>活動名稱</td>
          <td>主辦人</td>
          <td>狀態</td>
          <td>開團時間</td>
          <td>結團時間</td>
          <!-- <td class="text-end">功能列</td> -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>001</td>
          <td>
            揪品酒 high high
          </td>
          <td>Jone</td>
          <td class="text-success">開團中</td>
          <td>
            2022/04/15
          </td>
          <td>
            2022/04/22
          </td>
          <!-- <td class="text-end">
            <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
            <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
          </td> -->
        </tr>
        <tr>
        <td>002</td>
          <td>
            我有故事你有酒嗎?
          </td>
          <td>Nabi</td>
          <td class="text-danger">報名額滿</td>
          <td>
            2022/04/18
          </td>
          <td>
            2022/04/30
          </td>
          <!-- <td class="text-end">
            <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
            <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
          </td> -->
        </tr>
      </tbody>
    </table>

  </div>

  <?php require("../../component/footerLayout.php")?>
</body>
</html>