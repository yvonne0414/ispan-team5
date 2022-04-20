<?php
require("../../db-connect.php");

$prdNum=$_POST["prd_num"];
$prdName=$_POST["prd_name"];
$prdPrice=$_POST["prd_price"];
$prdStatus=$_POST["prd_status"];
$prdDisc=$_POST["prd_disc"];
$prdLength=$_POST["prd_length"];
$prdWidth=$_POST["prd_width"];
$prdHeight=$_POST["prd_height"];
$inventoryQuantity=$_POST["inventory_quantity"];
$prdImg=$_FILES["prdImg"]["name"];
$prdCateL=$_POST["prd_cate_l"];
$prdOrigin=$_POST["prd_origin"];
$prdBrand=$_POST["prd_brand"];
$prdMater=$_POST["prd_mater"];
$prdCapacity=$_POST["prd_capacity"];
$prdAbv=$_POST["prd_abv"];
$prdCateM=$_POST["prd_cate_m"];
$prdCateS=$_POST["prd_cate_s"];
//設定時區
date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');


// $data=[
//     "prdNum" =>$prdNum,
//     "prdName"=>$prdName,
//     "prdPrice"=>$prdPrice,
//     "prdStatus"=>$prdStatus,
//     "prdDisc"=>$prdDisc,
//     "prdLength"=>$prdLength,
//     "prdWidth"=>$prdWidth,
//     "prdHeight"=>$prdHeight,
//     "prdImg"=>$prdImg,
//     "prdCateL"=>$prdCateL,
//     "prdOrigin"=>$prdOrigin,
//     "prdBrand"=>$prdBrand,
//     "prdMater"=>$prdMater,
//     "prdCapacity"=>$prdCapacity,
//     "prdAbv"=>$prdAbv,
//     "prdCateM"=>$prdCateM,
//     "prdCateS"=>$prdCateS
// ];
// echo json_encode($data, JSON_UNESCAPED_UNICODE);


$sql="INSERT INTO prd_list (num, name, main_img, price, disc, length, width, height, inventory_quantity, category, status, create_time) VALUES ($prdNum, $prdName, $fileName, $prdPrice, $prdDisc, $prdLength, $prdWidth, $prdHeight, $inventoryQuantity, $prdCateL, $prdStatus, $now)";

echo $sql;

echo "<hr>";




if ($_FILES["prdImg"]["error"]==0){
    
    var_dump($_FILES["prdImg"]);
    echo "<hr>";

    $file_tmpname = $_FILES["prdImg"]["tmp_name"];
    $file_storepath = "/ispan-team5/assets/img/test/".$_FILES["prdImg"]["name"];

    echo $file_tmpname;
    echo "<hr>";
    echo $file_storepath;
    echo "<hr>";

    try {
        move_uploaded_file($file_tmpname, $file_storepath); 
        echo "成功";

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    

    if(move_uploaded_file($file_tmpname, $file_storepath)){
        echo "upload success!";
        //echo $_FILES["prdImg"]["name"]

        // $fileName= $_FILES["prdImg"]["name"];

        // $sql="INSERT INTO prd_list (num, name, main_img, price, disc, length, width, height, inventory_quantity, category, status, create_time) VALUES ('$prdNum', '$prdName', '$fileName', '$prdPrice', '$prdDisc', '$prdLength', '$prdWidth', '$prdHeight', '$inventoryQuantity', '$prdCateL', '$prdStatus', '$now')";

        // echo $sql;
        // if ($conn->query($sql) === TRUE) {
        //     echo "新增資料完成<br>";
        //     header("location: ../../view/page/product/prdList.php");
        // } else {
        //     echo "新增資料錯誤: "  . $conn->error;
        //     exit;
        // }
    }else{
       echo "upload fail!";
    } 
}




$conn->close();

// 嘗試api，有空再試 ==================================
// $prdNum=$_POST["prdNum"];
// $prdName=$_POST["prdName"];
// $prdPrice=$_POST["prdPrice"];
// $prdStatus=$_POST["prdStatus"];
// $prdDisc=$_POST["prdDisc"];
// $prdLength=$_POST["prdLength"];
// $prdWidth=$_POST["prdWidth"];
// $prdHeight=$_POST["prdHeight"];
// $prdImg=$_POST["prdImg"];
// $prdCateL=$_POST["prdCateL"];
// $prdDetail=$_POST["prdDetail"];

// $data=[
//     "prdNum" =>$prdNum,
//     "prdName"=>$prdName,
//     "prdPrice"=>$prdPrice,
//     "prdStatus"=>$prdStatus,
//     "prdDisc"=>$prdDisc,
//     "prdLength"=>$prdLength,
//     "prdWidth"=>$prdWidth,
//     "prdHeight"=>$prdHeight,
//     "prdImg"=>$prdImg,
//     "prdCateL"=>$prdCateL
// ];
// echo json_encode($data);
?>