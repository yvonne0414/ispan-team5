<?php
require("../../../db-connect.php");
if(!isset($_POST["name"])){
    echo "您不是透過正常管道到此頁";
    exit;
}
$sql="INSERT INTO group_list(name,disc,user_id) VALUE($,) ";

?>
<?php

$date = '';
$date1 = '';
$date2 = '';
if (isset($_GET['start_time']) && isset($_GET['end_time']) && isset($_GET['activity_start_time'])) {
    $date = $_GET['start_time'];
    $date1 = $_GET['end_time'];
    $date2 = $_GET['activity_start_time'];
}

$name=$_POST["name"];
$disc=$_POST["disc"];
$phone=$_POST["phone"]; //陣列
// $phones=join(",", $phone);

if(empty($name) || empty($email) || empty($phone)){
    echo "您有欄位沒有填寫";
    return;
}
// date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');

// echo "$name, $email, $phones";
$sql="INSERT INTO  group_list(name, email, phone, create_time, valid)VALUES ('$name', '$email', '$phone', '$now', 1)";

// echo $sql;
// exit;

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成<br>";
    $last_id=$conn->insert_id;
    // echo "last id is $last_id";
    // exit;

} else {
    echo "新增資料錯誤: " . $conn->error;
    exit;
}

$conn->close();

header("location: user-list.php");

?>   