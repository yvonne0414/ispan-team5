<?php
require("../../../db-connect.php");
if(!isset($_POST["name"])){
    echo "您不是透過正常管道到此頁";
    header("location: ../groupList.php");
}
session_start();
var_dump($_SESSION);

$userid=(int)$_SESSION['user']['id'];
// var_dump($userid);



$start_time = '';
$end_time = '';
$activity_start_time = '';

if (isset($_POST['start_time']) && isset($_POST['end_time']) && isset($_POST['activity_start_time'])) {
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $activity_start_time = $_POST['activity_start_time'];
}

$name=$_POST["name"];
$disc=$_POST["disc"];
$pass_num=$_POST["pass_num"];
$max_num=$_POST["max_num"];





if(empty($name) || empty($userid) || empty($pass_num) || empty($max_num)){
    echo "您有欄位沒有填寫";
    return;
}

date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');

if(strtotime($now) <= strtotime($start_time)){
  $status=1;
}else{
  $status=2;
}

// var_dump(strtotime($start_time));
// var_dump(strtotime($now));
// var_dump(strtotime($now) <= strtotime($start_time));
// var_dump($status);

// exit;

// echo "$name, $email, $phones";
$sql="INSERT INTO  group_list (name, disc, user_id, pass_num, now_num, max_num, is_official, status, start_time, end_time, activity_start_time) VALUES('$name', '$disc', '$userid', '$pass_num', 1,'$max_num', 2, $status, '$start_time','$end_time', '$activity_start_time')";


// echo $sql;
// exit;

if ($conn->query($sql) === TRUE) {
    // echo "新增資料完成<br>";
    echo "<script>alert('揪團新增完成');</script>";
    echo "<script>location.href='../groupList.php';</script>";
    exit;

} else {
    echo "新增資料錯誤: " . $conn->error;
    exit;
}

$conn->close();

header("location: ../groupList.php");

?>   