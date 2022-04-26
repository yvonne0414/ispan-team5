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
    <title>酒譜編輯</title>
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

        <h2>編輯酒譜</h2>

        <form action="doUpdate.php" class="d-flex flex-wrap mt-4" method="POST">
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
                        <input type="text" class="form-control" name="bartd_num" id="prd_num" value="<?= $row['name'] ?>">
                    </div>
                </div>


                <!-- image -->
                <div class="d-flex align-items-center w-75 pe-4 mb-3 me-1">
                    <div>
                        <label for="prd_img" class="form-label mb-0">商品圖片</label>
                    </div>
                    <div class="justify-content-center align-items-center img_container my-2">
                        <img id="prdImg_show" src="../../../assets/img/test/<?= $row["img"] ?>" />
                    </div>
                    <div class="">
                        <input type="file" value="YN-02.jpeg" class="form-control" name="bartd_img" id="prdImg" accept=".jpg, .jpeg, .png, .webp, .svg">
                    </div>
                </div>


                <!-- textarea -->
                <div class="d-flex align-items-center w-100 pe-4 mb-3">
                    <div>
                        <label for="prd_disc" class="form-label mb-0">商品描述</label>
                    </div>
                    <div class="flex-grow-1">
                        <textarea class="form-control" id="prd_disc" rows="3" name="bartd_content"><?= $row['recipe'] ?></textarea>
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
                // var_dump($rows2);
            ?>
                <div class="d-flex align-items-center w-100 pe-4 mb-3 me-1">
                    <div>
                        <label for="bartd-name" class="form-label mb-0">材料</label>
                    </div>
                    <!-- 名稱 -->
                    <div class="flex-grow-1">
                        <input type="hidden" name="bartd_id" value="<?= $_GET['id'] ?>">
                        <input type="text" class="form-control" name="bartd_name" id="bartd-name" value="<?= $row2['name'] ?>">
                    </div>
                    <!-- 比例 -->
                    <div class="flex-grow-1">
                        <input type="text" class="form-control" name="bartd_ratio" id="bartd-ratio" value="<?= $row2['mater_amount'] ?>">
                    </div>
                    <!-- master_cate_l -->
                    <div class="flex-grow-1">
                        <select class="form-select prd_cate_l" name="prd_cate_l" id="prd_cate_l">
                            <option>材料類別</option>

                        </select>
                    </div>
                    <!-- master_cate_m -->
                    <div class="flex-grow-1">
                        <select class="form-select prd_cate_m" name="prd_cate_m" id="prd_cate_m">
                            <option>請選擇</option>
                        </select>
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
                // var_dump($rows3);
            ?>
                <div class="d-flex align-items-center w-100 pe-4 mb-3">
                    <div>
                        <label for="bartd_cate_id_m" class="form-label mb-0">酒譜類別</label>
                    </div>
                    <div class="flex-grow-1">
                        <select class="form-select" name="bartd_cate_id_m" id="bartd_cate_id_m">
                            <option selected>酒譜類別</option>
                        </select>
                    </div>
                    <div class="flex-grow-1">
                        <select class="form-select" name="bartd_cate_id_s" id="bartd_cate_id_s">
                            <option selected>請選擇</option>
                        </select>
                    </div>
                </div>

            <?php endforeach; ?>

            <!-- 按鈕 -->
            <div class="w-100 text-center">
                <a class="btn btn-outline-dark" href="bartd-content.php?id=<?= $_GET["id"] ?>">返回</a>
                <button class="btn btn-dark" type="submit" id="prd_submit">確定</button>
            </div>
        </form>
    </div>

    <?php require("../../component/footerLayout.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        let prdCateL = document.querySelector("#prd_cate_l");
        let prdCateM = document.querySelector("#prd_cate_m");
        let bartdCateM = document.querySelector("#bartd_cate_id_m");
        let bartdCateS = document.querySelector("#bartd_cate_id_s");

        <?php
        $mater_cate_l = $rows2[0]["mater_cate_l"];
        // $mater_cate_m = $rows2[0]["mater_cate_m"];
        echo "let materCateL = $mater_cate_l";
        // echo "let materCateM = $mater_cate_m";

        ?>
        //呼叫產品大分類
        $.ajax({
                method: "POST",
                url: "../../../api/bartd/get-bartd_master_cate_l.php",
                dataType: "json"
            })
            .done(function(response) {
                let optionList = "";

                // console.log(response);
                for (let i = 0; i < response.length; i++) {
                    let item = response[i]
                    // 判斷selected
                    if (item.id == materCateL) {
                        optionList += `<option value="${item.id}" selected>${item.name}</option>`

                    } else {
                        optionList += `<option value="${item.id}">${item.name}</option>`
                    }

                }
                prdCateL.innerHTML += optionList
            }).fail(function(jqXHR, textStatus) {

                console.log("Request failed: " + textStatus);
            });

        <?php
        $mater_cate_m = $rows2[0]["mater_cate_m"];
        echo "let materCateM = $mater_cate_m";
        ?>
        // 分水
        // console.log(materCateL);
        // console.log(materCateM);
        $.ajax({
                method: "POST",
                url: "../../../api/bartd/get-bartd_master_cate_m.php",
                dataType: "json",
                data: {
                    parentId: materCateL
                }
            })
            .done(function(response) {

                // console.log(response);

                let count = `${response.length}`;
                let optionList = "";
                for (let i = 0; i < response.length; i++) {
                    let item = response[i]
                    // console.log(item.id)
                    // console.log(item.name)
                    // optionList += `<option value="${item.id}">${item.name}</option>`

                    // 判斷selected
                    if (item.id == materCateM) {
                        optionList += `<option value="${item.id}" selected>${item.name}</option>`

                    } else {
                        optionList += `<option value="${item.id}">${item.name}</option>`
                    }


                }

                // console.log(optionList)
                prdCateM.innerHTML += optionList

            }).fail(function(jqXHR, textStatus) {
                while (prdCateM.options.length > 0) {
                    prdCateM.options.remove(0);
                }
            });


        // 呼叫完大分類
        prdCateL.addEventListener('change', function() {
            let parentId = this.value;
            $.ajax({
                    method: "POST",
                    url: "../../../api/bartd/get-bartd_master_cate_m.php",
                    dataType: "json",
                    data: {
                        parentId: parentId
                    }
                })
                .done(function(response) {

                    while (prdCateM.options.length > 0) {
                        prdCateM.options.remove(0);
                    }

                    cateM = document.querySelector("#prd_cate_m");
                    let optionList = "<option selected>中分類</option>";

                    let count = `${response.length}`;
                    for (let i = 0; i < count; i++) {
                        let master_cate_id = `${response[i].id}`;
                        let master_cate_m_name = `${response[i].name}`;
                        optionList += `<option value="${master_cate_id}">${master_cate_m_name}</option>`
                    }

                    cateM.innerHTML = optionList

                }).fail(function(jqXHR, textStatus) {
                    while (prdCateM.options.length > 0) {
                        prdCateM.options.remove(0);
                    }
                });
        });

        // 呼叫酒譜大分類

        <?php
        $bartd_cate_id_m = $rows3[0]["bartd_cate_id_m"];
        echo "let bartdCateIdM = $bartd_cate_id_m;";
        ?>
        // console.log(bartdCateIdM);
        $.ajax({
                method: "POST",
                url: "../../../api/bartd/get-bartd_cate_id_l.php",
                dataType: "json"
            })
            .done(function(response) {
                let optionList = "";
                for (let i = 0; i < response.length; i++) {
                    let item = response[i]
                    if (item.id == bartdCateIdM) {
                        optionList += `<option value="${item.id}" selected>${item.name}</option>`

                    } else {
                        optionList += `<option value="${item.id}">${item.name}</option>`

                    }
                }
                bartdCateM.innerHTML += optionList
            }).fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });

        <?php
        $bartd_cate_id_s = $rows3[0]["bartd_cate_id_s"];
        echo "let bartdCateIdS = $bartd_cate_id_s;";
        ?>

        // 分水
        $.ajax({
                method: "POST",
                url: "../../../api/bartd/get-bartd_cate_id_m.php",
                dataType: "json",
                data: {
                    cateParentId: bartdCateIdM
                }
            })
            .done(function(response) {
                // console.log(response);
                bartdCateS = document.querySelector("#bartd_cate_id_s");
                let optionList = "<option selected>中分類</option>";
                let count = `${response.length}`;
                for (let i = 0; i < count; i++) {
                    let item = response[i];
                    // console.log(item.id);
                    // console.log(item.name);
                    if (item.id == bartdCateIdS) {
                        optionList += `<option value="${item.id}" selected>${item.name}</option>`

                    } else {
                        optionList += `<option value="${item.id}">${item.name}</option>`
                    }

                }

                bartdCateS.innerHTML = optionList

            }).fail(function(jqXHR, textStatus) {
                while (bartdCateS.options.length > 0) {
                    bartdCateS.options.remove(0);
                }
            });
        // 呼叫完酒譜大分類
        bartdCateM.addEventListener('change', function() {
            let cateParentId = this.value;
            $.ajax({
                    method: "POST",
                    url: "../../../api/bartd/get-bartd_cate_id_m.php",
                    dataType: "json",
                    data: {
                        cateParentId: cateParentId
                    }
                })
                .done(function(response) {

                    while (bartdCateS.options.length > 0) {
                        bartdCateS.options.remove(0);
                    }

                    bartdCateM = document.querySelector("#bartd_cate_id_s");
                    let optionList = "<option selected>中分類</option>";

                    let count = `${response.length}`;
                    for (let i = 0; i < count; i++) {
                        let master_cate_id = `${response[i].id}`;
                        let master_cate_m_name = `${response[i].name}`;
                        optionList += `<option value="${master_cate_id}">${master_cate_m_name}</option>`
                    }

                    bartdCateM.innerHTML = optionList

                }).fail(function(jqXHR, textStatus) {
                    while (bartdCateS.options.length > 0) {
                        bartdCateS.options.remove(0);
                    }
                });
        })
    </script>
    <script>
        // 圖片預覽
        $("#prdImg").change(function() {

            readURL(this);



        });

        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $(".img_container").css('display', "flex");

                    $("#prdImg_show").attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }

        }
    </script>

</body>

</html>