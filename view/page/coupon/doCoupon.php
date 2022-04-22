<?php
require_once("../../../db-connect.php");
session_start();

$coupon_cate = $_POST["coupon_cate"];
$name = $_POST["coupon_name"];
$discount = $_POST["discount"];
$rule_min = $_POST["min"];
$rule_max = $_POST["max"];
$vip_level = $POST["vip_level"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];


//echo "$coupon_name";

$sql = "INSERT INTO coupon_list (coupon_cate, name, discount, rule_min, rule_max, vip_level, start_time, end_time)
VALUES ('$coupon_cate', '$name', '$discount','$rule_min','$rule_max', '$vip_level','$start_time','$end_time')
";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成<br>";
    $last_id = $conn->insert_id;
    // echo "last id is $last_id";
    // exit;
    
    $_SESSION["message"] = "成功";
    echo $_SESSION["message"];
    
} else {
    echo "新增資料錯誤: "  . $conn->error;
    $_SESSION["message"] = "失敗";
    exit;
}
$conn->close();

header("location: couponList.php");
