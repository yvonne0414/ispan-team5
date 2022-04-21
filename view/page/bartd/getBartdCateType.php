<?php
require("../../../db-connect.php");
// $id = $row3["bartd_cate_id_m"];
$id = 12 ;
$sqlbartd_cate_type = "SELECT * FROM bartd_cate_type
WHERE id = $id";
$resultbartd_cate_type = $conn->query($sqlbartd_cate_type);
$rowbartd_cate_type = $resultbartd_cate_type->fetch_assoc();

// echo $rowbartd_cate_type['name'];


$id = 15;
$sqlprd_detail_cate = "SELECT * FROM prd_detail_cate
WHERE id = $id";
$resultprd_detail_cate = $conn->query($sqlprd_detail_cate);
$rowprd_detail_cate=$resultprd_detail_cate->fetch_assoc();
echo $rowprd_detail_cate["name"];
?>