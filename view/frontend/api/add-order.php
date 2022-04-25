<?php
require("../../../db-connect.php");

function  uuid(){  
  $chars = md5(uniqid(mt_rand(), true));  
  $uuid = substr ( $chars, 0, 8 ) . '-'
          . substr ( $chars, 8, 4 ) . '-' 
          . substr ( $chars, 12, 4 ) . '-'
          . substr ( $chars, 16, 4 ) . '-'
          . substr ( $chars, 20, 12 );  
  return $uuid ;  
}  
session_start();
$user=$_SESSION["user"];
$user_id = $user['id'];

// echo  uuid();
if(isset($_POST['choose_coupon'])){
  $user_coupon_id=$_POST['choose_coupon'];
}


$data=[
    'user_id'=>$user_id,
    "prd_content"=>[
      [
        "id"=>1,
        "amount"=>2
      ],
      [
        "id"=>2,
        "amount"=>4
      ],
      [
        "id"=>3,
        "amount"=>4
      ]
    ],
    "logistics"=>1
];




//新增訂單至order_list
$order_id=uuid();
$user_id=$data['user_id'];
$logistics=$data['logistics'];
date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');
var_dump($order_id);
var_dump($user_id);
var_dump($logistics);
var_dump($now);
// exit;
$sql="INSERT INTO order_list (id, user_id, logistics, logistics_state, order_time) VALUES ( '$order_id', '$user_id', '$logistics', 1, '$now')";
if ($conn->query($sql) === TRUE) {
    echo "新增資料完成<br>";

    //新增訂單商品詳情至order_detail
    $prd_count=count($data['prd_content']);
    $prd_content=$data['prd_content'];
    var_dump($prd_count);
    echo "<br>";
    var_dump($prd_content);
    echo "<br>";

    for($i=0; $i<$prd_count; $i++){

    $prd_id=$prd_content[$i]['id'];
    $prd_amount=$prd_content[$i]['amount'];
    var_dump($prd_id);
    echo "<br>";
    var_dump($prd_amount);
    echo "<br>";
    $sqlDetail="INSERT INTO order_detail (order_id, prd_id, amount,  is_packaging, packaging_cate) VALUES ('$order_id', '$prd_id', '$prd_amount', 0, 1)";
    
    if ($conn->query($sqlDetail) === TRUE) {
        echo "新增資料完成<br>";
        if(isset($_POST['choose_coupon'])){
          //刪除用戶優惠券
          $sql="DELETE FROM user_coupon WHERE id='$user_coupon_id'";
          if ($conn->query($sql) === TRUE) {
            echo "優惠券刪除完成<br>";
          }
        }
        

        
    } else {
        echo "新增資料錯誤: "  . $conn->error;
        exit;
    }

    }
    
} else {
    echo "新增資料錯誤: "  . $conn->error;
    exit;
}


$conn->close();

header('location: ../homePage.php');


?>