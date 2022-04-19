<?php
if(!isset($_POST["parentId"])){
    $data=[
        "status"=>0,
        "message"=> "沒有傳參數"
    ];
    echo json_encode($data);
    exit;
}

$parentId=$_POST["parentId"];

require_once("../../db-connect.php");

$sql = "SELECT * FROM prd_detail_cate WHERE level = 3 AND parent_id = $parentId";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
echo json_encode($rows,JSON_UNESCAPED_UNICODE	);

$conn->close();
?>