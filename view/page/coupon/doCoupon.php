<?php
require_once("../../../db-connect.php");
//session_start();

$coupon_cate = $_POST["coupon_cate"];
$name = $_POST["coupon_name"];
$discount = $_POST["discount"];
$rule_min = $_POST["min"];
$rule_max = $_POST["max"];
$vip_level = $_POST["vip_level"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];


//echo "$coupon_name";

$sql = "INSERT INTO coupon_list (coupon_cate, name, discount, rule_min, rule_max, vip_level, start_time, end_time)
VALUES ('$coupon_cate', '$name', '$discount','$rule_min','$rule_max', '$vip_level','$start_time','$end_time')
";

if ($conn->query($sql) === TRUE) {
    // echo "新增資料完成<br>";
    $last_id=$conn->insert_id;
    $sql="SELECT id FROM user_list WHERE vip_level >= $vip_level";
    $rs=$conn->query($sql);
    $rows=$rs->fetch_All(MYSQLI_ASSOC);
    // var_dump($rows);

    if(count($rows)>0){
        foreach($rows as $row){
            $userId = (int)$row['id'];
            $userCouSql = "INSERT INTO user_coupon (user_id, coupon_id) VALUES ('$userId', '$last_id')";
            if ($conn->query($userCouSql) === TRUE){
                // echo "優惠券發送成功";
            }
        }
    }

    // exit;

    echo "<script>alert('新增成功');</script>";
    echo "<script>location.href='couponList.php';</script>";
    // $last_id = $conn->insert_id;
    // echo "last id is $last_id";
    
   // $_SESSION["message"] = "成功";
   // echo $_SESSION["message"];


} else {
    echo "新增資料錯誤: "  . $conn->error;
   // $_SESSION["message"] = "失敗";
    exit;
}
$conn->close();

// header("location: couponList.php");
