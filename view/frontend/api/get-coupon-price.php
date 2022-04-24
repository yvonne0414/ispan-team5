<?php
if(!isset($_POST["user_coupon_id"])){
    $data=[
        "status"=>0,
        "message"=> "沒有傳參數"
    ];
    echo json_encode($data);
    exit;
}

$user_coupon_id=$_POST["user_coupon_id"];

require_once("../../../db-connect.php");

$sql="SELECT user_coupon.id AS user_coupon_id, coupon_list.discount FROM user_coupon
JOIN coupon_list ON user_coupon.coupon_id = coupon_list.id 
WHERE user_coupon.id='$user_coupon_id'
";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// var_dump($row);
// exit;
echo json_encode($row,JSON_UNESCAPED_UNICODE);

$conn->close();
?>