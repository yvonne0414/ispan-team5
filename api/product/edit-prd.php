<?php
require("../../db-connect.php");

if(isset($_FILES["prdImg"])){

    if($_FILES["prdImg"]["error"]==0){

        $file_tmpname = $_FILES["prdImg"]["tmp_name"];
        $fileName = $_FILES["prdImg"]["name"];
        $file_storepath = "../../assets/img/test/".$fileName;

        if(move_uploaded_file($file_tmpname, $file_storepath)){
            echo "upload success!";

            $prdNum=$_POST["prd_num"];
            $prdName=$_POST["prd_name"];
            $prdPrice=$_POST["prd_price"];
            $prdStatus=$_POST["prd_status"];
            $prdDisc=trim($_POST["prd_disc"]);
            $prdLength=$_POST["prd_length"];
            $prdWidth=$_POST["prd_width"];
            $prdHeight=$_POST["prd_height"];
            $inventoryQuantity=$_POST["inventory_quantity"];
            $prdImg=$_FILES["prdImg"]["name"];
            $prdCateL=$_POST["prd_cate_l"];


            $sql="UPDATE prd_list SET prd_num='$prdNum', name='$prdName',main_img='prdImg' , price= $prdPrice, status=$prdStatus, disc='$prdDisc', length=$prdLength, width=$prdWidth,  height=$prdHeight, inventory_quantity=$inventoryQuantity, category=$prdCateL WHERE id='$id'";




            echo $sql;

            if ($conn->query($sql) === TRUE) {
                echo "更新成功";
                

                $type = (int)$prdCateL;
                echo $type;

                switch($type){
                    case 1:
                        $prdOrigin=$_POST["prd_origin"];
                        $prdBrand=$_POST["prd_brand"];
                        $prdCapacity=$_POST["prd_capacity"];
                        $prdAbv=$_POST["prd_abv"];
                        $prdCateM=$_POST["prd_cate_m"];
                        $prdCateS=$_POST["prd_cate_s"];
                        $sqldetail="UPDATE prd_type1_detail SET abv=$prdAbv, origin=$prdOrigin, brand='$prdBrand', capacity=$prdCapacity, cate_m=$prdCateM, cate_s=$prdCateS WHERE prd_id=$id" ;
                        break;
                    case 2:
                        $prdOrigin=$_POST["prd_origin"];
                        $prdBrand=$_POST["prd_brand"];
                        $prdCapacity=$_POST["prd_capacity"];
                        $prdCateM=$_POST["prd_cate_m"];

                        $sqldetail="UPDATE prd_type2_detail SET origin=$prdOrigin, brand='$prdBrand', capacity=$prdCapacity, cate_m=$prdCateM WHERE prd_id=$id";
                        break;
                    case 3:
                    case 4:
                        $prdOrigin=$_POST["prd_origin"];
                        $prdMater=$_POST["prd_mater"];
                        $prdCapacity=$_POST["prd_capacity"];
                        $prdCateM=$_POST["prd_cate_m"];

                        $sqldetail="UPDATE prd_type3_detail SET origin=$prdOrigin, capacity=$prdCapacity, mater=$prdMater, cate_m=$prdCateM WHERE prd_id=$id";
                        break;
                }
                if ($conn->query($sqldetail) === TRUE) {
                    echo "更新資料完成<br>";
                } else {
                    echo "新增資料錯誤: "  . $conn->error;
                    exit;
                }

                echo "更新資料完成";
                header('location: ../../view/page/product/prdList.php');
            } else {
                echo "新增資料錯誤: "  . $conn->error;
                exit;
            }
        }else{
        echo "upload fail!";
        } 
        // header("location: ../../view/page/product/prdList.php");
    }

}else{

    $id = $_POST["prd_id"];
    $prdNum=$_POST["prd_num"];
    $prdName=$_POST["prd_name"];
    $prdPrice=$_POST["prd_price"];
    $prdStatus=$_POST["prd_status"];
    $prdDisc=trim($_POST["prd_disc"]);
    $prdLength=$_POST["prd_length"];
    $prdWidth=$_POST["prd_width"];
    $prdHeight=$_POST["prd_height"];
    $inventoryQuantity=$_POST["inventory_quantity"];
    $prdCateL=$_POST["prd_cate_l"];



    $sql="UPDATE prd_list SET prd_num='$prdNum', name='$prdName', price= $prdPrice, status=$prdStatus, disc='$prdDisc', length=$prdLength, width=$prdWidth,  height=$prdHeight, inventory_quantity=$inventoryQuantity, category=$prdCateL WHERE id='$id'";



    // echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "更新成功";
        

        $type = (int)$prdCateL;
        echo $type;

        switch($type){
            case 1:
                $prdOrigin=$_POST["prd_origin"];
                $prdBrand=$_POST["prd_brand"];
                $prdCapacity=$_POST["prd_capacity"];
                $prdAbv=$_POST["prd_abv"];
                $prdCateM=$_POST["prd_cate_m"];
                $prdCateS=$_POST["prd_cate_s"];
                $sqldetail="UPDATE prd_type1_detail SET abv=$prdAbv, origin=$prdOrigin, brand='$prdBrand', capacity=$prdCapacity, cate_m=$prdCateM, cate_s=$prdCateS WHERE prd_id=$id" ;
                break;
            case 2:
                $prdOrigin=$_POST["prd_origin"];
                $prdBrand=$_POST["prd_brand"];
                $prdCapacity=$_POST["prd_capacity"];
                $prdCateM=$_POST["prd_cate_m"];

                $sqldetail="UPDATE prd_type2_detail SET origin=$prdOrigin, brand='$prdBrand', capacity=$prdCapacity, cate_m=$prdCateM WHERE prd_id=$id";
                break;
            case 3:
            case 4:
                $prdOrigin=$_POST["prd_origin"];
                $prdMater=$_POST["prd_mater"];
                $prdCapacity=$_POST["prd_capacity"];
                $prdCateM=$_POST["prd_cate_m"];

                $sqldetail="UPDATE prd_type3_detail SET origin=$prdOrigin, capacity=$prdCapacity, mater=$prdMater, cate_m=$prdCateM WHERE prd_id=$id";
                break;
        }
        if ($conn->query($sqldetail) === TRUE) {
            // echo "更新資料完成<br>";
            echo "<script>alert('修改成功！');</script>";
            echo "<script>location.href='../../view/page/product/prdList.php';</script>";
        } else {
            echo "新增資料錯誤: "  . $conn->error;
            exit;
        }

        // echo "更新資料完成";
        // header('location: ../../view/page/product/prdList.php');
    } else {
        echo "新增資料錯誤: "  . $conn->error;
        exit;
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