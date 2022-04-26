<?php
require("../../../db-connect.php");
$id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../component/headerLayout.php">
    <title>酒譜資訊</title>
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
            <?php
            $sql = "SELECT * FROM bartd_list
            WHERE id = $id";
            $result = $conn->query($sql);
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) :
            ?>
                <div class="d-flex align-items-center w-100 pe-4 mb-3">
                    <div>
                        <label for="prd_num" class="form-label mb-0">酒譜名稱</label>
                    </div>
                    <div class="flex-grow-1">
                        <input type="text" disabled class="form-control" name="bartd_num" id="prd_num" value="<?= $row['name'] ?>">
                    </div>
                </div>


                <!-- image -->
                <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
                    <div>
                        <label for="prd_img" class="form-label mb-0">商品圖片</label>
                    </div>
                    <div class="justify-content-center align-items-center img_container my-2">
                        <img id="prdImg_show" src="../../../assets/img/test/<?= $row["img"] ?>" />
                    </div>
                </div>


                <!-- textarea -->
                <div class="d-flex align-items-center w-100 pe-4 mb-3">
                    <div>
                        <label for="prd_disc" class="form-label mb-0">商品描述</label>
                    </div>
                    <div class="flex-grow-1">
                        <textarea class="form-control" disabled id="prd_disc" rows="3" name="bartd_content"><?= $row['recipe'] ?></textarea>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- 材料 -->

            <?php
            $id = $_GET["id"];
            $sql2 = "SELECT * FROM bartd_material
            WHERE bartd_id = $id";
            $result2 = $conn->query($sql2);
            $rows2 = $result2->fetch_all(MYSQLI_ASSOC);
            foreach ($rows2 as $row2) :
            ?>
                <div class="d-flex align-items-center w-100 pe-4 mb-3 me-1">
                    <div>
                        <label for="bartd-name" class="form-label mb-0">材料</label>
                    </div>
                    <!-- 名稱 -->
                    <div class="flex-grow-1">
                        <input type="text" disabled class="form-control" name="bartd_name" id="bartd-name" value="<?= $row2['name'] ?>">
                    </div>
                    <!-- 比例 -->
                    <div class="flex-grow-1">
                        <input type="text" disabled class="form-control" name="bartd_ratio" id="bartd-ratio" value="<?= $row2['mater_amount'] ?>">
                    </div>
                    <!-- master_cate_l -->
                    <div class="flex-grow-1">
                        <input type="text" disabled class="form-control" name="prd_cate_l" id="prd_cate_l" value="
                        <?php

                        $id = $row2["mater_cate_l"];
                        $sqlprd_detail_cate = "SELECT * FROM prd_detail_cate
                        WHERE id = $id";
                        $resultprd_detail_cate = $conn->query($sqlprd_detail_cate);
                        $row2["mater_cate_l"] = $resultprd_detail_cate->fetch_assoc();

                        echo $row2["mater_cate_l"]['name'];

                        ?>
                        
                        ">
                    </div>
                    <!-- master_cate_m -->

                    <div class="flex-grow-1">
                        <input type="text" disabled class="form-control" name="prd_cate_m" id="prd_cate_m" value="

                        <?php
                        $id = $row2["mater_cate_m"];
                        $sqlprd_detail_cate = "SELECT * FROM prd_detail_cate
                        WHERE id = $id";
                        $resultprd_detail_cate = $conn->query($sqlprd_detail_cate);
                        $row2["mater_cate_m"] = $resultprd_detail_cate->fetch_assoc();

                        echo $row2["mater_cate_m"]['name'];
                        ?>
                        
                        ">
                    </div>
                </div>

            <?php endforeach; ?>

            <!-- 酒譜類別 -->

            <?php
            $id = $_GET["id"];
            $sql3 = "SELECT * FROM bartd_cate_list
            WHERE bartd_id = $id";
            $result3 = $conn->query($sql3);
            $rows3 = $result3->fetch_all(MYSQLI_ASSOC);
            foreach ($rows3 as $row3) :
            ?>
                <div class="d-flex align-items-center w-100 pe-4 mb-3">
                    <div>
                        <label for="bartd_cate_id_m" class="form-label mb-0">酒譜類別</label>
                    </div>
                    <div class="flex-grow-1">
                        <input type="text" disabled class="form-control" name="bartd_cate_id_m" id="bartd_cate_id_m" value="
                <?php
                $id = $row3["bartd_cate_id_m"];
                $sqlbartd_cate_type = "SELECT * FROM bartd_cate_type
                WHERE id = $id";
                $resultbartd_cate_type = $conn->query($sqlbartd_cate_type);
                $rowbartd_cate_type = $resultbartd_cate_type->fetch_assoc();
                echo $rowbartd_cate_type['name'];
                ?>
                        ">
                    </div>
                    <div class="flex-grow-1">
                        <input type="text" disabled class="form-control" name="bartd_cate_id_s" id="bartd_cate_id_s" value="
                        <?php
                        $id = $row3["bartd_cate_id_s"];
                        $sqlbartd_cate_type = "SELECT * FROM bartd_cate_type
WHERE id = $id";
                        $resultbartd_cate_type = $conn->query($sqlbartd_cate_type);
                        $rowbartd_cate_type = $resultbartd_cate_type->fetch_assoc();

                        echo $rowbartd_cate_type['name'];

                        ?>
                        
                        ">
                    </div>
                </div>

            <?php endforeach; ?>

            <!-- 按鈕 -->
            <div class="w-100 text-center">
                <a class="btn btn-outline-dark" href="bartd-list.php">返回</a>
                <a href="/ispan-team5/view/page/bartd/bartd-edit.php?id=<?php
                                                                                        $id = $_GET["id"];
                                                                                        echo $id;
                                                                                        ?>" class="btn btn-dark">編輯</a>
            </div>
        </form>
    </div>

    <?php require("../../component/footerLayout.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        let prd_detail_cate = {
            1: ['威士忌', '龍舌蘭', '琴酒', '香甜酒', '白蘭地', '蘭姆酒', '伏特加'],
            2: ['果汁', '醃漬水果、果乾', '碳酸飲料', '糖漿＆酸甜汁', '冰塊', '無酒精酒款', '調味材料']

        };

        let bartd_cate_type = {
            1: ['Fancy', 'Frozen', 'Sling', 'Frappe', 'Punch', 'Fizz', 'Trio', 'Duo', 'Tiki\'s', 'Cocktail', 'Highball', 'Sour', 'Collins', 'Buck', 'Dessert'],

            2: ['Brandy Glass', 'Champagne Glass', 'Margarita Glass', 'Champagne Saucer', 'Hurricane Glass', 'Old Fashioned', 'Highball Glass', 'Collins Glass', 'Cocktail Glass', 'Mojito Glass'],

            3: ['Roll', 'Blend', 'Shake', 'Stir', 'Build'],

            4: ['Straight', 'Longdrink', 'On the Rock', 'Frozen']

        };
    </script>
</body>

</html>