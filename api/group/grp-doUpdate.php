<?php
require("../../db-connect.php");
if(!isset($_POST["name"])){
    echo "您不是透過正常管道到此頁";
    exit;
}




$date = '';
$date1 = '';
$date2 = '';
if (isset($_POST['start_time']) && isset($_POST['end_time']) && isset($_POST['activity_start_time'])) {
    $date = $_POST['start_time'];
    $date1 = $_POST['end_time'];
    $date2 = $_POST['activity_start_time'];
}
if (isset($_POST['start_time'])) {
    echo '?start_time=' . $date . '&start_time=' . $date;
}
if (isset($_POST['end_time'])) {
    echo '?end_time=' . $date1 . '&end_time=' . $date1;
}
if (isset($_POST['activity_start_time'])) {
    echo '?activity_start_time=' . $date2 . '&activity_start_time=' . $date2;
}

$name=$_POST["name"];
$disc=$_POST["disc"];
$userid=$_POST["user_id"];
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
$sql="UPDATE group_list SET name='$name', disc='$disc', user_id='$userid', pass_num='$pass_num', max_num='$max_num', is_official='1', start_time='$date', end_time='$date1', activity_start_time='$date2' WHERE id='$id'";


// echo $sql;
// exit;

if ($conn->query($sql) === TRUE) {
    echo "更新資料完成<br>";
    $last_id=$conn->insert_id;
    // echo "last id is $last_id";
    // exit;
    $sql_2="UPDATE group_official SET group_id='$last_id', price=$price, vip_level='$vip_level'  WHERE id='$group_id'";
    if ($conn->query($sql_2) === TRUE) {
        echo "更新資料完成<br>";
    } else {
        echo "更新資料錯誤: "  . $conn->error;
        exit;       
    }

    echo "更新資料完成<br>";

} else {
    echo "更新資料錯誤: " . $conn->error;
    exit;
}

$conn->close();

header("location: ../../view/page/group/groupList.php");

?>   