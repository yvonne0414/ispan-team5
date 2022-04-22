<?php
require("../../../db-connect.php");
$id = $_GET["id"];



$sql_DelBartdList ="DELETE FROM `bartd_list` WHERE `bartd_list`.`id` = $id";
$conn->query($sql_DelBartdList);

$sql_DelBartdCateList = "DELETE FROM `bartd_cate_list` WHERE `bartd_cate_list`.`bartd_id` = $id";
$conn->query($sql_DelBartdCateList);

$sql_DelBartdMaterial = "DELETE FROM `bartd_material` WHERE `bartd_material`.`bartd_id` = $id";
$conn->query($sql_DelBartdMaterial);

$conn->close();


header("location: bartd-list.php");
?>