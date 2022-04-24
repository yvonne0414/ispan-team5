<?php
require_once("../../db-connect.php");
$id=$_GET['id'];

// $sql="SELECT category FROM prd_list WHERE id='$id'";
// $result = $conn->query($sql);
// $row = $result->fetch_assoc();
// switch($row["category"]){
//   case "1":
//     $tableType = 1;
//     break;

//   case "2":
//     $tableType = 2;
//     break;
  
//   case "3":
//   case "4":
//     $tableType = 4;
//     break;

// }
// echo $tableType;
// echo "<br>";

// $dbtable="prd_type".$tableType."_detail";

// //DELETE
// $sql="DELETE FROM prd_list WHERE id='$id'";
// $sqlDetail="DELETE FROM $dbtable WHERE prd_id='$id'";
// echo $sql;
// echo "<br>";
// echo $sqlDetail;


// if ($conn->query($sql) === TRUE) {
//     if ($conn->query($sqlDetail) === TRUE) {
//         echo "刪除資料完成<br>";
//         header('location:../../view/page/product/prdList.php');
//     } else {
//         echo "刪除資料錯誤: "  . $conn->error;
//         exit;       
//     }
// } else {
//     echo "刪除資料錯誤: "  . $conn->error;
//     exit;       
// }

//DELETE 軟刪除
$sql="UPDATE prd_list SET status=3 WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    // echo "刪除資料完成<br>";
    // header('location:../../view/page/product/prdList.php');

    echo "<script>alert('刪除成功！');</script>";
    echo "<script>location.href='../../view/page/product/prdList.php';</script>";
} else {
    echo "刪除資料錯誤: "  . $conn->error;
    exit;       
}



$conn->close();
?>