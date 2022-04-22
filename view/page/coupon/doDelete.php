<?php
require_once("../../../db-connect.php");

if(!isset($_GET["id"])){
    header("location: 404.php");
    
}

// $id=$_GET["id"];
$id=$_GET["id"];

// echo $id;

require_once("../../../db-connect.php");
//DELETE
$sql="DELETE FROM coupon_list WHERE id='$id'";

//SIFT DELETE

//$sql="UPDATE user_list SET vip_lavel=0 WHERE id='$id'";

//echo $sql;

if ($conn->query($sql) === TRUE) {
    //echo "刪除成功";
    echo "<script>alert('刪除成功');</script>";
    echo "<script>location.href='couponList.php';</script>";
    exit;
    

} else {
    echo "刪除資料錯誤: "  . $conn->error;
    exit;
}
$conn->close();

// header("location: couponList.php");



?>