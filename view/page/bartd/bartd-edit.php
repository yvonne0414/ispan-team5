<?php
require("../../../db-connect.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../component/headerLayout.php">
    <title>商品資訊</title>
    <?php require("../../component/headerLayout.php") ?>
    <style>
        .form-label {
            width: 100px;
        }

        .img_container {
            max-height: 200px;
            max-width: 200px;
            border-radius: 10px;
            overflow: hidden;
        }

        .img_container img {
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">

        <h2>查看酒譜</h2>

        <form action="doCreat.php" class="d-flex flex-wrap mt-4" method="POST">
            <!--  enctype="multipart/form-data" -->
            <!-- 名稱 -->
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="prd_num" class="form-label mb-0">酒譜名稱</label>
                </div>
                <div class="flex-grow-1">
                    <input type="text" disabled class="form-control" name="bartd_num" id="prd_num" value="CHEN">
                </div>
            </div>

            <!-- image -->
            <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                <div>
                    <label for="prd_img" class="form-label mb-0">商品圖片</label>
                </div>
                <div class="justify-content-center align-items-center img_container my-2">
                    <img id="prdImg_show" src="../../../assets/img/test/A008.jpg" />
                </div>
            </div>

            <!-- textarea -->
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="prd_disc" class="form-label mb-0">商品描述</label>
                </div>
                <div class="flex-grow-1">
                    <textarea class="form-control" id="prd_disc" rows="3" name="bartd_content">１．將啤酒以外的材料加入做好粉口的握把式啤酒杯
２．攪拌均勻後，插入啤酒
３．最後放上裝飾物即可

裝飾物：Tajin墨西哥調味粉、檸檬角</textarea>
                </div>
            </div>

            <!-- 材料 -->
            <div class="d-flex align-items-center w-100 pe-4 mb-3 me-1">
                <div>
                    <label for="bartd-name" class="form-label mb-0">材料</label>
                </div>
                <!-- 名稱 -->
                <div class="flex-grow-1">
                    <input type="text" class="form-control" name="bartd_name" id="bartd-name" value="蕃茄汁">
                </div>
                <!-- 比例 -->
                <div class="flex-grow-1">
                    <input type="text" class="form-control" name="bartd_ratio" id="bartd-ratio" value="60 ml">
                </div>
                <!-- master_cate_l -->
                <div class="flex-grow-1">
                    <select class="form-select" name="prd_cate_l" id="prd_cate_l">
                        <option selected>基酒</option>
                    </select>
                </div>
                <!-- master_cate_m -->
                <div class="flex-grow-1">
                    <select class="form-select" name="prd_cate_m" id="prd_cate_m">
                        <option selected>其他</option>
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center w-100 pe-4 mb-3 me-1">
                <div>
                    <label for="bartd-name" class="form-label mb-0"></label>
                </div>
                <!-- 名稱 -->
                <div class="flex-grow-1">
                    <input type="text" class="form-control" name="bartd_name" id="bartd-name" value="現榨檸檬汁">
                </div>
                <!-- 比例 -->
                <div class="flex-grow-1">
                    <input type="text" class="form-control" name="bartd_ratio" id="bartd-ratio" value="15 ml">
                </div>
                <!-- master_cate_l -->
                <div class="flex-grow-1">
                    <select class="form-select" name="prd_cate_l" id="prd_cate_l">
                        <option selected>副材料</option>
                    </select>
                </div>
                <!-- master_cate_m -->
                <div class="flex-grow-1">
                    <select class="form-select" name="prd_cate_m" id="prd_cate_m">
                        <option selected>其他</option>
                    </select>
                </div>
            </div>

            <!-- 酒譜類別 -->
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="bartd_cate_id_m" class="form-label mb-0">酒譜類別</label>
                </div>
                <div class="flex-grow-1">
                    <select class="form-select" name="bartd_cate_id_m" id="bartd_cate_id_m">
                        <option selected>調法</option>
                    </select>
                </div>
                <div class="flex-grow-1">
                    <select class="form-select" name="bartd_cate_id_s" id="bartd_cate_id_s">
                        <option selected>Build</option>
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="bartd_cate_id_m" class="form-label mb-0"></label>
                </div>
                <div class="flex-grow-1">
                    <select class="form-select" name="bartd_cate_id_m" id="bartd_cate_id_m">
                        <option selected>飲用方式</option>
                    </select>
                </div>
                <div class="flex-grow-1">
                    <select class="form-select" name="bartd_cate_id_s" id="bartd_cate_id_s">
                        <option selected>Longdrink</option>
                    </select>
                </div>
            </div>


            <!-- 按鈕 -->
            <div class="w-100 text-center">
                <a class="btn btn-outline-primary" href="bartd-list.php">返回</a>
                <a href="" class="btn btn-primary">編輯</a>
            </div>
        </form>
    </div>

    <?php require("../../component/footerLayout.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>