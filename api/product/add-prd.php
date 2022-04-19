<?php

require("../../db-connect.php");

$prdNum=$_POST["prdNum"];
$prdName=$_POST["prdName"];
$prdPrice=$_POST["prdPrice"];
$prdStatus=$_POST["prdStatus"];
$prdDisc=$_POST["prdDisc"];
$prdLength=$_POST["prdLength"];
$prdWidth=$_POST["prdWidth"];
$prdHeight=$_POST["prdHeight"];
// $prdImg=$_POST["prdImg"];
$prdCateL=$_POST["prdCateL"];
$prdDetail=$_POST["prdDetail"];

$data=[
    "prdNum" =>$prdNum,
    "prdName"=>$prdName,
    "prdPrice"=>$prdPrice,
    "prdStatus"=>$prdStatus,
    "prdDisc"=>$prdDisc,
    "prdLength"=>$prdLength,
    "prdWidth"=>$prdWidth,
    "prdHeight"=>$prdHeight,
    // "prdImg"=>$prdImg,
    "prdCateL"=>$prdCateL,
    "prdDetail"=>[$prdDetail]
];
echo json_encode($data);
$conn->close();
?>