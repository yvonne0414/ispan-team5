<?php

require_once("../../../db-connect.php");

$id=$_POST["coupon_id"];
$coupon_cate = $_POST["coupon_cate"];
$name = $_POST["name"];
$discount = $_POST["discount"];
$rule_min = $_POST["rule_min"];
$rule_max = $_POST["rule_max"];
$vip_level = $_POST["vip_level"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];


//echo "$name";

$sql = "UPDATE coupon_list SET coupon_cate='$coupon_cate', name='$name', discount='$discount', rule_min='$rule_min', rule_max='$rule_max', vip_level='$vip_level', start_time='$start_time',
end_time='$end_time' WHERE id='$id'";


 //echo $sql;
if ($conn->query($sql) === TRUE) {
    //echo "更新成功";
    echo "<script>alert('修改成功');</script>";
    echo "<script>location.href='couponList.php';</script>";
    exit;
 

} else {
    echo "更新資料錯誤: " . $conn->error;
    exit;
}    
$conn->close();

header("location: couponList.php");
?>