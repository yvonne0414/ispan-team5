<?php
require("../../../db-connect.php");


if($_FILES["bartd_img"]["error"]==0){

    $file_tmpname = $_FILES["bartd_img"]["tmp_name"];
    $fileName = $_FILES["bartd_img"]["name"];
    $file_storepath = "../../../assets/img/test/".$fileName;
    // echo $file_tmpname."<hr>";
    // echo $fileName."<hr>";
    // echo $file_storepath."<hr>";

    if(move_uploaded_file($file_tmpname, $file_storepath)){
        echo "upload success!";
        // 調酒名稱
$bartd_num= $_POST["bartd_num"];

// 材料
$bartd_name= $_POST["bartd_name"];
$bartd_ratio = $_POST["bartd_ratio"];
$prd_cate_l = $_POST["prd_cate_l"];
$prd_cate_m = $_POST["prd_cate_m"];

// 酒譜類別
$bartd_cate_id_m = $_POST["bartd_cate_id_m"];
$bartd_cate_id_s = $_POST["bartd_cate_id_s"];

// 照片名稱
// $bartd_img = $_POST["bartd_img"];

// 調酒描述
$bartd_content = $_POST["bartd_content"];

// echo "$bartd_num, $bartd_name, $bartd_ratio, $prd_cate_l, $prd_cate_m, $bartd_cate_id_m, $bartd_cate_id_s, $bartd_img, $bartd_content";

$tdList_sql="INSERT INTO bartd_list(name, img, recipe)
VALUE ('$bartd_num', '$fileName', '$bartd_content')";
$conn->query($tdList_sql);

$last_id = $conn->insert_id;

$tdCateList_sql="INSERT INTO bartd_cate_list(bartd_id, bartd_cate_id_m, bartd_cate_id_s)
VALUE ('$last_id', '$bartd_cate_id_m', '$bartd_cate_id_s')";
$conn->query($tdCateList_sql);

$tdMaterial_sql="INSERT INTO bartd_material(bartd_id, name, mater_amount, mater_cate_l, mater_cate_m)
VALUE ('$last_id', '$bartd_name', '$bartd_ratio', '$prd_cate_l', '$prd_cate_m')";
$conn->query($tdMaterial_sql);


    }else{
    echo "upload fail!";
 } 
}


// header("location: bartd-list.php")

?>