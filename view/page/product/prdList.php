<?php
require("../../../db-connect.php");



$sql="SELECT id, prd_num, name, main_img, price, status FROM prd_list";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>商品列表</title>
  <?php require("../../component/headerLayout.php")?>
</head>
<body>
  <?php require("../../component/header.php")?>
  <?php require("../../component/sidemenu.php")?>
  <div class="container py-5">
    <h2>商品列表</h2>

    <div class="d-flex justify-content-between align-items-center mt-4">
      <div class="form-floating mb-3">
        <input type="text" class="form-control round-0 border-0 border-bottom" id="searchInput">
        <label for="searchInput">search</label>
      </div>
      <div>
        <a class="btn btn-primary" href="./prdinfo-add.php">新增商品</a>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr class="table-dark">
          <td>序號</td>
          <td class="text-center">圖片</td>
          <td>編號</td>
          <td>名稱</td>
          <td>價格</td>
          <td>狀態</td>
          <td class="text-end">功能列</td>
        </tr>
      </thead>
      <tbody>
        <?php for($i=0; $i<count($rows); $i++):?>
        <tr>
          <td><?=$i+1?></td>
          <td class="prd-list_img">
            <img class="img-fluid " src="../../../assets/img/test/<?=$rows[$i]["main_img"]?>" alt="">
          </td>
          <td><?=$rows[$i]["prd_num"]?></td>
          <td><?=$rows[$i]["name"]?></td>
          <td>
            NT.<?=$rows[$i]["price"]?>
          </td>
          <td>
            <span class="<?php echo $rows[$i]["status"]==1 ? "bg-primary":"bg-warning" ?> text-white p-1 rounded-2">
              <?php echo $rows[$i]["status"]==1 ? "上架":"下架" ?>
            </span>
          </td>
          <td class="text-end">
            <a class="px-2" href="./prdinfo.php?mode=view&id=<?=$rows[$i]["id"]?>"><i class="fa-solid fa-eye"></i></a>
            <a class="px-2" href="./prdinfo.php?mode=edit&id=<?=$rows[$i]["id"]?>"><i class="fa-solid fa-pen"></i></a>
            <a class="px-2" href="" onclick="deletePrd(e)"><i class="fa-solid fa-trash-can"></i></a>
          </td>
        </tr>
        <?php endfor;?>
      </tbody>
    </table>

  </div>

  <?php require("../../component/footerLayout.php")?>

  <script>
    function deletePrd(e){

    }
  </script>
</body>
</html>