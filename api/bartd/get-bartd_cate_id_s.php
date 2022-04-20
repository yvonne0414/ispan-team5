<?php
if(!isset($_POST["cateParentMId"])){
    $data=[
        "status"=>0,
        "message"=> "沒有傳參數"
    ];
    echo json_encode($data);
    exit;
}

$cateParentMId=$_POST["cateParentMId"];

require_once("../../db-connect.php");

$sql = "SELECT * FROM bartd_cate_type WHERE level = 2 AND parent_id = $cateParentMId";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
echo json_encode($rows,JSON_UNESCAPED_UNICODE);

$conn->close();
?>