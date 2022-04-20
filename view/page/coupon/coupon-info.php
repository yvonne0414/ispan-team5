<?php
require("../../../db-connect.php");

// $sql = "SELECT * FROM prd_material_cate";
// $result = $conn->query($sql);
// $rows = $result->fetch_all(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("../../component/headerLayout.php") ?>

    <title>優惠券</title>
    <style>
        .form-label {
            width: 100px;
        }

        #coupon_num,
        #min_line,
        #max_line,
        #coupon_type,
        #user_level,
        #date_start,
        #date_end {
            width: 300px;
        }
    </style>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">

        <h2>優惠折扣券</h2>

        <form action="" class="d-flex flex-wrap mt-4" placeh>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div class="mb-3">
                    <label for="coupon_num" class="form-label mb-0 me-2">優惠代碼</label>
                </div>
                <!-- <div class="flex-grow-1">
                    <input type="text" class="form-control" name="coupon_num" id="coupon_num">
                </div> -->
                <input class="form-control" type="text" placeholder="Readonly input here..." aria-label="readonly input example" readonly name="coupon_num" id="coupon_num">
            </div>
            <div class="d-flex align-items-center w-75 pe-4 mb-3">
                <div class="mb-3">
                    <label for="coupon_name" class="form-label me-2">優惠券名稱</label>
                </div>
                <div class="flex-grow-1">
                    <input type="text" class="form-control" name="coupon_name" id="coupon_name">
                </div>
            </div>
            <div class="d-flex align-items-center pe-4">
                <div class="mb-3">
                    <label for="user_level" class="form-label me-2">會員等級</label>
                </div>
                <div class="mb-3">
                    <select class="form-select form-select-md " name="user_level" id="user_level">
                        <option selected>請選擇</option>
                        <option value="2">一般會員</option>
                        <option value="3">VIP會員</option>
                    </select>
                </div>
            </div>

            <div class="d-flex align-items-center w-100 pe-4 ">
                <div class="mb-3">
                    <label for="coupon_type" class="form-label me-2">優惠種類</label>
                </div>
                <div class="mb-3">
                    <select class="form-select form-select-md " name="coupon_type" id="coupon_type">
                        <option selected>請選擇種類</option>
                        <option value="1">折扣</option>
                        <option value="2">折扣率(%)</option>
                    </select>
                </div>
                
            </div>

            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="coupon_line" class="form-label mb-0 me-2">優惠金額限制</label>
                </div>
                <div class="flex-grow-1 d-flex">
                    <input type="number" class="form-control me-1" name="min" id="min_line" value="">

                    <span class="mx-2 my-2">~</span>
                    <input type="text" class="form-control me-1" name="max" id="max_line" value="">
                    <span class="my-2"> 元</span>
                </div>
            </div>

            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="date_start" class="form-label mb-0 me-2">開始日期</label>
                </div>
                <div class="flex-grow-1 d-flex">
                    <input type="date" class="form-control me-1" name="date_start" id="date_start" value="">

                </div>
            </div>
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="coupon_line" class="form-label mb-0 me-2">結束日期</label>
                </div>
                <div class="flex-grow-1 d-flex">
                    <input type="date" class="form-control me-1" name="date_end" id="date_end" value="">

                </div>
            </div>
            <div class="w-100 text-center">
                <button class="btn btn-outline-primary py-2 px-3" type="button">取消</button>
                <button class="btn btn-primary py-2 px-3" type="button">儲存</button>
            </div>
        </form>
    </div>



    </form>
    </div>

    <?php require("../../component/footerLayout.php") ?>

    <!-- <script>
    ClassicEditor
      .create( document.querySelector( '#prd_disc' ) )
      .then( editor => {
              console.log( editor );
      } )
      .catch( error => {
              console.error( error );
      } );
  </script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        // 抓節點
        let prdPrice = document.querySelector("");
        let prdNum = document.querySelector("#coupon_type");
        let prdName = document.querySelector("user_coupon");



        // 呼叫選單內容、畫面邏輯

        //呼叫產品大分類
        $.ajax({
                method: "POST",
                url: "../../../api/product/get-prd_cate_l.php",
                dataType: "json"
            })
            .done(function(response) {
                let optionList = "";
                for (let i = 0; i < response.length; i++) {
                    let item = response[i]
                    optionList += `<option value="${item.id}">${item.name}</option>`
                }
                prdCateL.innerHTML += optionList
            }).fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });

        // 商品細節項
        let prdOriginWraper = document.querySelector(".prd_origin-wraper")
        let prdBrandWraper = document.querySelector(".prd_brand-wraper")
        let prdCapacityWraper = document.querySelector(".prd_capacity-wraper")
        let prdAbvWraper = document.querySelector(".prd_abv-wraper")
        let prdMaterWraper = document.querySelector(".prd_mater-wraper")
        let prdCateMWraper = document.querySelector(".prd_cate_m-wraper")
        let prdCateSWraper = document.querySelector(".prd_cate_s-wraper")

        // 呼叫中分類
        prdCateL.addEventListener("change", function() {

            prdOriginWraper.style.display = "none"
            prdBrandWraper.style.display = "none"
            prdAbvWraper.style.display = "none"
            prdCapacityWraper.style.display = "none"
            prdMaterWraper.style.display = "none"
            prdCateMWraper.style.display = "none"
            prdCateSWraper.style.display = "none"

            switch (parseInt(prdCateL.value)) {
                case 1:
                    prdOriginWraper.style.display = "flex"
                    prdBrandWraper.style.display = "flex"
                    prdAbvWraper.style.display = "flex"
                    prdCapacityWraper.style.display = "flex"
                    prdCateMWraper.style.display = "flex"
                    prdCateSWraper.style.display = "flex"
                    break;
                case 2:
                    prdOriginWraper.style.display = "flex"
                    prdBrandWraper.style.display = "flex"
                    prdCapacityWraper.style.display = "flex"
                    prdCateMWraper.style.display = "flex"
                    break;
                case 3:
                case 4:
                    prdOriginWraper.style.display = "flex"
                    prdCapacityWraper.style.display = "flex"
                    prdMaterWraper.style.display = "flex"
                    prdCateMWraper.style.display = "flex"
                    break;
            }

            $.ajax({
                    method: "POST",
                    url: "../../../api/product/get-prd_cate_M.php",
                    dataType: "json",
                    data: {
                        parentId: prdCateL.value
                    }
                })
                .done(function(response) {
                    let cateM = document.querySelector("#prd_cate_m");
                    let optionList = "<option selected>中分類</option>";
                    for (let i = 0; i < response.length; i++) {
                        let item = response[i]
                        optionList += `<option value="${item.id}">${item.name}</option>`
                    }
                    cateM.innerHTML = optionList
                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });


        })

        // 呼叫小分類
        prdCateM.addEventListener("change", function() {

            $.ajax({
                    method: "POST",
                    url: "../../../api/product/get-prd_cate_s.php",
                    dataType: "json",
                    data: {
                        parentId: prdCateM.value
                    }
                })
                .done(function(response) {
                    let optionList = "<option selected>小分類</option>";
                    for (let i = 0; i < response.length; i++) {
                        let item = response[i]
                        optionList += `<option value="${item.id}">${item.name}</option>`
                    }
                    prdCateS.innerHTML = optionList
                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });

        })

        //呼叫產地
        $.ajax({
                method: "POST",
                url: "../../../api/product/get-prd_origin.php",
                dataType: "json"
            })
            .done(function(response) {
                let origin = document.querySelector("#prd_origin");
                let optionList = "";
                for (let i = 0; i < response.length; i++) {
                    let item = response[i]
                    optionList += `<option value="${item.id}">${item.name}</option>`
                }
                origin.innerHTML += optionList
            }).fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });

        // 呼叫材質
        $.ajax({
                method: "POST",
                url: "../../../api/product/get-prd_mater_cate.php",
                dataType: "json"
            })
            .done(function(response) {
                let mater = document.querySelector("#prd_mater");
                let optionList = "";
                for (let i = 0; i < response.length; i++) {
                    let item = response[i]
                    optionList += `<option value="${item.id}">${item.name}</option>`
                }
                mater.innerHTML += optionList
            }).fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });

        // 送出表單
        let send = document.querySelector("#prd_submit");
        send.addEventListener("click", function() {
            // 抓值
            let prdNumVal = prdNum.value;
            let prdNameVal = prdName.value;
            let prdPriceVal = prdPrice.value;
            let prdStatusVal = prdStatus.value;
            let prdDiscVal = prdDisc.value;
            let prdLengthVal = prdLength.value;
            let prdWidthVal = prdWidth.value;
            let prdHeightVal = prdHeight.value;
            let prdImgVal = prdImg.value;
            let prdCateLVal = prdCateL.value;
            let prdOriginVal = prdOrigin.value;
            let prdBrandVal = prdBrand.value;
            let prdCapacityVal = prdCapacity.value;
            let prdAbvVal = prdAbv.value;
            let prdMaterVal = prdMater.value;
            let prdCateMVal = prdCateM.value;
            let prdCateSVal = prdCateS.value;

            console.log(
                `prdNum: ${prdNumVal}`,
                `prdName: ${prdNameVal}`,
                `prdPrice: ${prdPriceVal}`,
                `prdStatus: ${prdStatusVal}`,
                `prdDisc: ${prdDiscVal}`,
                `prdLength: ${prdLengthVal}`,
                `prdWidth: ${prdWidthVal}`,
                `prdHeight: ${prdHeightVal}`,
                `prdImg: ${prdImgVal}`,
                `prdCateL: ${prdCateLVal}`,
                `prdOrigin: ${prdOriginVal}`,
                `prdBrand: ${prdBrandVal}`,
                `prdCapacity: ${prdCapacityVal}`,
                `prdAbv: ${prdAbvVal}`,
                `prdMater: ${prdMaterVal}`,
                `prdCateM: ${prdCateMVal}`,
                `prdCateS: ${prdCateSVal}`
            )
            // if(prdNum=="" || prdName=="" || prdPrice=="" || prdStatus=="" || prdDisc=="" || prdLength=="" || prdWidth=="" || prdHeight=="" || prdImg=="" || prdCateL=="" ){
            //     alert("有欄位未填");
            //     return;
            // }
            let prdDetail
            switch (parseInt(prdCateL)) {
                case 1:
                    prdDetail = {
                        prdOrigin: prdOrigin,
                        prdBrand: prdBrand,
                        prdCapacity: prdCapacity,
                        prdAbv: prdAbv,
                        prdCateM: prdCateM,
                        prdCateS: prdCateS
                    }
                    break;
                case 2:
                    prdDetail = {
                        prdOrigin: prdOrigin,
                        prdBrand: prdBrand,
                        prdCapacity: prdCapacity,
                        prdCateM: prdCateM
                    }
                    break;
                case 3:
                case 4:
                    prdDetail = {
                        prdOrigin: prdOrigin,
                        prdMater: prdMater,
                        prdCapacity: prdCapacity,
                        prdCateM: prdCateM
                    }
                    break;
            }

            consol.log(prdDetail)

            $.ajax({
                    method: "POST",
                    url: "add-prd.php",
                    dataType: "json",
                    data: {
                        prdNum: prdNumVal,
                        prdName: prdNameVal,
                        prdPrice: prdPriceVal,
                        prdStatus: prdStatusVal,
                        prdDisc: prdDiscVal,
                        prdLength: prdLengthVal,
                        prdWidth: prdWidthVal,
                        prdHeight: prdHeightVal,
                        // prdImg: prdImgVal,
                        prdCateL: prdCateLVal,
                        prdDetail: [prdDetailVal]
                    }
                })
                .done(function(response) {
                    console.log(response)
                    alert("in!")

                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });

            alert("out");
        })
    </script>
</body>

</html>