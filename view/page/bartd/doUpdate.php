<?php
require("../../../db-connect.php");

// 調酒名稱
$bartd_id=$_POST["bartd_id"];
$bartd_num= $_POST["bartd_num"];

$bartd_img = $_POST["bartd_img"];

// 調酒描述
$bartd_content = $_POST["bartd_content"];

// 材料
$bartd_name= $_POST["bartd_name"];
$bartd_ratio = $_POST["bartd_ratio"];
$prd_cate_l = $_POST["prd_cate_l"];
$prd_cate_m = $_POST["prd_cate_m"];

// 酒譜類別
$bartd_cate_id_m = $_POST["bartd_cate_id_m"];
$bartd_cate_id_s = $_POST["bartd_cate_id_s"];




$tdList_sql="UPDATE bartd_list 
SET name = '$bartd_num', recipe =  '$bartd_content' , img='$bartd_img'
WHERE id = $bartd_id";
$conn->query($tdList_sql);

$tdCateList_sql ="UPDATE bartd_cate_list
SET bartd_cate_id_m = '$bartd_cate_id_m', bartd_cate_id_s = '$bartd_cate_id_s'
WHERE bartd_id = $bartd_id
";
$conn-> query($tdCateList_sql);

$tdMaterial_sql ="UPDATE bartd_material
SET name= '$bartd_name', mater_amount ='$bartd_ratio', mater_cate_l='$prd_cate_l', mater_cate_m='$prd_cate_m'
WHERE bartd_id = $bartd_id
";
$conn-> query($tdMaterial_sql);



header("location: bartd-list.php")

?>