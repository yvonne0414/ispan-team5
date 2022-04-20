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
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>商品資訊</title>
  <?php require("../../component/headerLayout.php")?>
  <style>
    .form-label{
      width: 100px;
    }
    .prd_origin-wraper, .prd_brand-wraper, .prd_capacity-wraper, .prd_abv-wraper,  .prd_mater-wraper, .prd_cate_m-wraper, .prd_cate_s-wraper {
      display: none;
    }
  </style>
</head>
<body>
  <?php require("../../component/header.php")?>
  <?php require("../../component/sidemenu.php")?>
  <div class="container py-5">

    <h2>新增商品</h2>

    <form action="" class="d-flex flex-wrap mt-4">
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_num" class="form-label mb-0">商品編號</label>
        </div>
        <div class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_num" id="prd_num">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_name" class="form-label mb-0">商品名稱</label>
        </div>
        <div  class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_name" id="prd_name">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_price" class="form-label mb-0">商品價格</label>
        </div>
        <div class="flex-grow-1">
          <input type="number"  class="form-control" name="prd_price" id="prd_price">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_price" class="form-label mb-0">商品狀態</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_status" id="prd_status">
            <option value="1" selected>上架</option>
            <option value="2">下架</option>
          </select>
        </div>
      </div>
      <div class="d-flex align-items-center w-100 pe-4 mb-3">
        <div>
          <label for="prd_disc" class="form-label mb-0">商品描述</label>
        </div>
        <div  class="flex-grow-1">
          <textarea class="form-control" id="prd_disc" rows="3"></textarea>
          <!-- <div id="prd_disc"></div> -->
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="" class="form-label mb-0">商品材積</label>
        </div>
        <div class="d-flex align-items-center">
          <input type="number"  min="0" class="form-control" placeholder="長(mm)" name="prd_length" id="prd_length">
          <span class="mx-3">:</span>
          <input type="number" min="0"  class="form-control" placeholder="寬(mm)" name="prd_width" id="prd_width">
          <span class="mx-3">:</span>
          <input type="number" min="0" class="form-control" placeholder="高(mm)" name="prd_height" id="prd_height">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_height" class="form-label mb-0">庫存數量</label>
        </div>
        <div class="flex-grow-1">
          <input type="number" min="0" class="form-control" name="prd_height" id="prd_height">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">銷售數量</label>
        </div>
        <div class="flex-grow-1">
          <input type="number" min="0" class="form-control" disabled value="3234">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="prd_img" class="form-label mb-0">商品圖片</label>
        </div>
        <div class="flex-grow-1">
          <input type="file"  class="form-control"  name="prd_img[]" id="prd_img" multiple>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="prd_cate_l" class="form-label mb-0">商品大分類</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_cate_l" id="prd_cate_l">
            <option selected>請選擇</option>
          </select>
        </div>
      </div>
      <div class="align-items-center w-50 pe-4 mb-3 prd_origin-wraper">
        <div>
          <label for="prd_cate_l" class="form-label mb-0">產地</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_origin" id="prd_origin">
            <option selected>請選擇</option>
          </select>
        </div>
      </div>
      <div class="align-items-center w-50 pe-4 mb-3 prd_brand-wraper">
        <div>
          <label for="prd_brand" class="form-label mb-0">品牌</label>
        </div>
        <div class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_brand" id="prd_brand">
        </div>
      </div>
      <div class="align-items-center w-50 pe-4 mb-3 prd_mater-wraper">
        <div>
          <label for="prd_mater" class="form-label mb-0">材質</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_mater" id="prd_mater">
            <option selected>請選擇</option>
          </select>
        </div>
      </div>
      <div class=" align-items-center w-50 pe-4 mb-3 prd_capacity-wraper">
        <div>
          <label for="prd_capacity" class="form-label mb-0">容量</label>
        </div>
        <div class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_capacity" id="prd_capacity" placeholder="ml">
        </div>
      </div>
      <div class=" align-items-center w-50 pe-4 mb-3 prd_abv-wraper">
        <div>
          <label for="prd_abv" class="form-label mb-0">酒精濃度</label>
        </div>
        <div class="flex-grow-1">
          <input type="number" min="0" class="form-control" name="prd_abv" id="prd_abv" placeholder="%">
        </div>
      </div>
      <div class="align-items-center w-50 pe-4 mb-3 prd_cate_m-wraper">
        <div>
          <label class="form-label mb-0">分類</label>
        </div>
        <div class="flex-grow-1 d-flex">
          <select class="form-select" name="prd_cate_m" id="prd_cate_m">
            <option selected>中分類</option>
          </select>
          <select class="form-select ms-3 prd_cate_s-wraper" name="prd_cate_s" id="prd_cate_s">
            <option selected>小分類</option>
          </select>
        </div>
      </div>
      <div class="w-100 text-center">
        <button class="btn btn-outline-primary">取消</button>
        <button class="btn btn-primary" type="" id="prd_submit">確定</button>
      </div>
    </form>
  </div>

  <?php require("../../component/footerLayout.php")?>

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
    let prdNum = document.querySelector("#prd_num");
    let prdName = document.querySelector("#prd_name");
    let prdPrice = document.querySelector("#prd_price");
    let prdStatus = document.querySelector("#prd_status");
    let prdDisc = document.querySelector("#prd_disc");
    let prdLength = document.querySelector("#prd_length");
    let prdWidth = document.querySelector("#prd_width");
    let prdHeight = document.querySelector("#prd_height");
    let prdImg = document.querySelector("#prd_img");
    let prdCateL = document.querySelector("#prd_cate_l");
    let prdOrigin = document.querySelector("#prd_origin");
    let prdBrand = document.querySelector("#prd_brand");
    let prdCapacity = document.querySelector("#prd_capacity");
    let prdAbv = document.querySelector("#prd_abv");
    let prdMater = document.querySelector("#prd_mater");
    let prdCateM = document.querySelector("#prd_cate_m");
    let prdCateS = document.querySelector("#prd_cate_s");

    
    // 呼叫選單內容、畫面邏輯

    //呼叫產品大分類
    $.ajax({
      method: "POST",
      url: "../../../api/product/get-prd_cate_l.php",
      dataType: "json"
    })
    .done(function(response) {
      let optionList = ""; 
      for(let i =0; i<response.length; i++){
        let item= response[i]
        optionList += `<option value="${item.id}">${item.name}</option>`
      }
      prdCateL.innerHTML += optionList
    }).fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });

    // 商品細節項
    let prdOriginWraper  = document.querySelector(".prd_origin-wraper")
    let prdBrandWraper = document.querySelector(".prd_brand-wraper")
    let prdCapacityWraper = document.querySelector(".prd_capacity-wraper")
    let prdAbvWraper = document.querySelector(".prd_abv-wraper")
    let prdMaterWraper = document.querySelector(".prd_mater-wraper")
    let prdCateMWraper = document.querySelector(".prd_cate_m-wraper")
    let prdCateSWraper = document.querySelector(".prd_cate_s-wraper")

    // 呼叫中分類
    prdCateL.addEventListener("change",function(){

      prdOriginWraper.style.display = "none"
      prdBrandWraper.style.display = "none"
      prdAbvWraper.style.display = "none"
      prdCapacityWraper.style.display = "none"
      prdMaterWraper.style.display = "none"
      prdCateMWraper.style.display = "none"
      prdCateSWraper.style.display = "none"

      switch(parseInt(prdCateL.value)){
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
        for(let i =0; i<response.length; i++){
          let item= response[i]
          optionList += `<option value="${item.id}">${item.name}</option>`
        }
        cateM.innerHTML = optionList
      }).fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
      });

      
    })

    // 呼叫小分類
    prdCateM.addEventListener("change",function(){

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
        for(let i =0; i<response.length; i++){
          let item= response[i]
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
      for(let i =0; i<response.length; i++){
        let item= response[i]
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
      for(let i =0; i<response.length; i++){
        let item= response[i]
        optionList += `<option value="${item.id}">${item.name}</option>`
      }
      mater.innerHTML += optionList
    }).fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });

    // 送出表單
    let send=document.querySelector("#prd_submit");
    send.addEventListener("click", function(){
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
      switch(parseInt(prdCateL)){
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
              prdDetail:[prdDetailVal]
          }
      })
      .done(function(response) {
          console.log(response)    
          alert("in!")      

      }).fail(function( jqXHR, textStatus ) {
          console.log( "Request failed: " + textStatus );
      });

      alert("out");
    })
    
  </script>
</body>
</html>