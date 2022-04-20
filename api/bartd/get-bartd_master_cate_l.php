<?php
require_once("../../db-connect.php");

$sql = "SELECT * FROM prd_detail_cate 
WHERE level = 1 AND (id = 1 || id =2)";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
echo json_encode($rows,JSON_UNESCAPED_UNICODE);

$conn->close();
?>