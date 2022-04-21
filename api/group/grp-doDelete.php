<?php
require("../../db-connect.php");


// if(!isset($_POST["id"])){
//     header("location: /ispan-team5/view/group/404.php");
//     // 沒有變數的話跑到 404 頁面
//   }
  
$id=$_POST["id"];
echo $id;

require("../../db-connect.php");
// DELETE
// $sql="DELETE FROM user WHERE id='$id'";

// SOFT DELETE
$sql="UPDATE group_list SET valid=0  WHERE id='$id'";


// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

$conn->close();


?>