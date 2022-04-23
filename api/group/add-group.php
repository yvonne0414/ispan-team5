<?php
require("../../db-connect.php");
if(!isset($_POST["name"])){
    echo "您不是透過正常管道到此頁";
    exit;
}
session_start();
var_dump($_SESSION);

$userid=(int)$_SESSION['user']['id'];
var_dump($userid);



$date = '';
$date1 = '';
$date2 = '';

if (isset($_POST['start_time']) && isset($_POST['end_time']) && isset($_POST['activity_start_time'])) {
    $date = $_POST['start_time'];
    $date1 = $_POST['end_time'];
    $date2 = $_POST['activity_start_time'];
}
// if (isset($_POST['start_time'])) {
//     echo '?start_time=' . $date . '&start_time=' . $date;
// }
// if (isset($_POST['end_time'])) {
//     echo '?end_time=' . $date1 . '&end_time=' . $date1;
// }
// if (isset($_POST['activity_start_time'])) {
//     echo '?activity_start_time=' . $date2 . '&activity_start_time=' . $date2;
// }

$name=$_POST["name"];
$disc=$_POST["disc"];
// $userid=$_POST["user_id"];
$vip_level=$_POST["vip_level"];
$price=$_POST["price"];
$pass_num=$_POST["pass_num"];
$max_num=$_POST["max_num"];





if(empty($name) || empty($userid) || empty($price) || empty($pass_num) || empty($max_num)){
    echo "您有欄位沒有填寫";
    return;
}
// date_default_timezone_set("Asia/Taipei");
// $now=date('Y-m-d H:i:s');

// echo "$name, $email, $phones";
$sql="INSERT INTO  group_list (name, disc, user_id, pass_num, now_num, max_num, is_official, status, start_time, end_time, activity_start_time) VALUES('$name', '$disc', '$userid', '$pass_num', 0,'$max_num', 1, 1, '$date','$date1', '$date2')";


// echo $sql;
// exit;

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成<br>";
    $last_id=$conn->insert_id;
    // echo "last id is $last_id";
    // exit;
    $sql_2="INSERT INTO group_official(group_id, price, vip_level) VALUES ($last_id, $price, $vip_level)";

    if ($conn->query($sql_2) === TRUE) {
        echo "新增資料完成<br>";
    } else {
        echo "新增資料錯誤1: "  . $conn->error;
        exit;       
    }

    echo "新增資料完成<br>";

} else {
    echo "新增資料錯誤2: " . $conn->error;
    exit;
}

$conn->close();

header("location: ../../view/page/group/groupList.php");

?>   