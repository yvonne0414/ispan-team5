<?php
require("../../../db-connect.php");

// 調酒名稱
$bartd_id=$_POST["bartd_id"];
$bartd_num= $_POST["bartd_num"];

// 調酒描述
$bartd_content = $_POST["bartd_content"];

// echo "$bartd_num, $bartd_name, $bartd_ratio, $prd_cate_l, $prd_cate_m, $bartd_cate_id_m, $bartd_cate_id_s, $bartd_img, $bartd_content";


$tdList_sql="UPDATE bartd_list 
SET name = '$bartd_num', recipe =  '$bartd_content'
WHERE id = $bartd_id";
$conn->query($tdList_sql);

header("location: bartd-list.php")

?>