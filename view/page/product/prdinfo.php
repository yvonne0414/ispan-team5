<?php
require("../../../db-connect.php");

$mode=$_GET["mode"];

$id = $_GET['id'];
$sql = "SELECT * FROM prd_list WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

switch($row["category"]){
  case 1:
    $tableCate = 1;
    break;
  case 2:
    $tableCate = 2;
    break;
  case 3:
  case 4:
    $tableCate = 3;
    break;
}

$db_table = 'prd_type'.$tableCate.'_detail';

$sqlDetail = "SELECT * FROM $db_table WHERE prd_id=$id";
$resultDetail = $conn->query($sqlDetail);
$rowDetail = $resultDetail->fetch_assoc();
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
    .img_container{
      max-height: 200px;
      max-width: 120px;
      border-radius:10px;
      overflow:hidden;
      display: none;
    }
    .img_container img{
      object-fit:cover;
      width: 100%;
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

    <h2><?=($mode== "edit"?"編輯":"查看") ?>商品</h2>

    <form action="../../../api/product/edit-prd.php" method="post" class="d-flex flex-wrap mt-4"  enctype="multipart/form-data"   onSubmit="return check();" >
      <input type="number" class="d-none" value="<?=$row['id']?>" name="prd_id">
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_num" class="form-label mb-0">商品編號</label>
        </div>
        <div class="flex-grow-1">
          <input type="text" required  class="form-control" name="prd_num" id="prd_num" value='<?=$row["prd_num"]?>' <?=($mode== "edit"?"":"disabled") ?>>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_name" class="form-label mb-0">商品名稱</label>
        </div>
        <div  class="flex-grow-1">
          <input type="text" required  class="form-control" name="prd_name" id="prd_name" value='<?= $row["name"]?>' <?=($mode== "edit"?"":"disabled") ?>>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_price" class="form-label mb-0">商品價格</label>
        </div>
        <div class="flex-grow-1">
          <input type="number" required  class="form-control" name="prd_price" id="prd_price"  value='<?= $row["price"] ?>' <?=($mode== "edit"?"":"disabled") ?>>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="prd_price"  class="form-label mb-0">商品狀態</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_status" id="prd_status"   <?=($mode== "edit"?"":"disabled") ?>>
            <option value="1"  <?= $row["status"]== 1 ? "selected": "" ?>>上架</option>
            <option value="2" <?= $row["status"]== 2 ? "selected" : "" ?>>下架</option>
          </select>
        </div>
      </div>
      <div class="d-flex align-items-center w-100 pe-4 mb-3">
        <div>
          <label for="prd_disc" class="form-label mb-0">商品描述</label>
        </div>
        <div  class="flex-grow-1">
          <textarea class="form-control" id="prd_disc" name="prd_disc" rows="3" <?=($mode== "edit"?"":"disabled") ?> value="<?= $row["disc"]?>">
            <?php echo trim($row["disc"])?>
          </textarea>
          <!-- <div id="prd_disc"></div> -->
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="" class="form-label mb-0">商品材積</label>
        </div>
        <div class="d-flex align-items-center">
          <input type="number" required  min="0" class="form-control" placeholder="長(mm)" name="prd_length" id="prd_length" value='<?= $row["length"]?>' <?=($mode== "edit"?"":"disabled") ?>>
          <span class="mx-3">:</span>
          <input type="number" required min="0"  class="form-control" placeholder="寬(mm)" name="prd_width" id="prd_width" value='<?= $row["width"]?>' <?=($mode== "edit"?"":"disabled") ?>>
          <span class="mx-3">:</span>
          <input type="number" required min="0" class="form-control" placeholder="高(mm)" name="prd_height" id="prd_height" value='<?= $row["height"] ?>' <?=($mode== "edit"?"":"disabled") ?>>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="inventory_quantity" class="form-label mb-0">庫存數量</label>
        </div>
        <div class="flex-grow-1">
          <input type="number" required min="0" class="form-control" name="inventory_quantity" id="inventory_quantity" value='<?= $row["inventory_quantity"]?>' <?=($mode== "edit"?"":"disabled") ?>>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="sale_quantity" class="form-label mb-0">銷售數量</label>
        </div>
        <div class="flex-grow-1">
          <input type="number" min="0" class="form-control" readonly name="sale_quantity" id="sale_quantity" value='<?= $row["sale_quantity"]?>' >
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="prdImg" class="form-label mb-0">商品圖片</label>
        </div>
        <div class="flex-grow-1">
          <div class="justify-content-center align-items-center img_container my-2">
            <img id="prdImg_show" src="#"/>
          </div>
        </div>
      </div>
      
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="prd_cate_l" class="form-label mb-0">商品大分類</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_cate_l" id="prd_cate_l" <?=($mode== "edit"?"":"disabled") ?>>
            <!-- <option selected disabled>請選擇</option> -->
          </select>
        </div>
      </div>
      <div class="align-items-center w-50 pe-4 mb-3 prd_origin-wraper">
        <div>
          <label for="prd_cate_l" class="form-label mb-0">產地</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_origin" id="prd_origin"  <?=($mode== "edit"?"":"disabled") ?>>
            <option disabled>請選擇</option>
          </select>
        </div>
      </div>
      <div class="align-items-center w-50 pe-4 mb-3 prd_brand-wraper">
        <div>
          <label for="prd_brand" class="form-label mb-0">品牌</label>
        </div>
        <div class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_brand" id="prd_brand" value='<?= $rowDetail["brand"]?>' <?=($mode== "edit"?"":"disabled") ?>>
        </div>
      </div>
      <div class="align-items-center w-50 pe-4 mb-3 prd_mater-wraper">
        <div>
          <label for="prd_mater" class="form-label mb-0">材質</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_mater" id="prd_mater"  <?=($mode== "edit"?"":"disabled") ?>>
            <option disabled>請選擇</option>
          </select>
        </div>
      </div>
      <div class=" align-items-center w-50 pe-4 mb-3 prd_capacity-wraper">
        <div>
          <label for="prd_capacity" class="form-label mb-0">容量</label>
        </div>
        <div class="flex-grow-1">
          <input type="number"  class="form-control" name="prd_capacity" id="prd_capacity" placeholder="ml" value='<?= $rowDetail["capacity"]?>' <?=($mode== "edit"?"":"disabled") ?>>
        </div>
      </div>
      <div class=" align-items-center w-50 pe-4 mb-3 prd_abv-wraper">
        <div>
          <label for="prd_abv" class="form-label mb-0">酒精濃度</label>
        </div>
        <div class="flex-grow-1">
          <input type="number" min="0" max="100" class="form-control" name="prd_abv" id="prd_abv" placeholder="%"  <?=($mode== "edit"?"":"disabled") ?> <?php if($row["category"]=="1"):?> value='<?= $rowDetail["abv"]?>' <?php endif;?>>
        </div>
      </div>
      <div class="align-items-center w-50 pe-4 mb-3 prd_cate_m-wraper">
        <div>
          <label class="form-label mb-0">分類</label>
        </div>
        <div class="flex-grow-1 d-flex">
          <select class="form-select" name="prd_cate_m" id="prd_cate_m"  <?=($mode== "edit"?"":"disabled") ?>>
            <option disabled>中分類</option>
          </select>
          <select class="form-select ms-3 prd_cate_s-wraper" name="prd_cate_s" id="prd_cate_s"  <?=($mode== "edit"?"":"disabled") ?>>
            <option disabled>小分類</option>
          </select>
        </div>
      </div>
      <div class="w-100 text-center">
        <a class="btn btn-outline-dark" href="./prdList.php">返回列表</a>
        <?php if($mode== "edit"): ?>
        <button class="btn btn-dark" type="submit" id="prd_submit">修改</button>
        <?php endif;?>
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
    let prdImg = document.querySelector("#prdImg");
    let prdCateL = document.querySelector("#prd_cate_l");
    let prdOrigin = document.querySelector("#prd_origin");
    let prdBrand = document.querySelector("#prd_brand");
    let prdCapacity = document.querySelector("#prd_capacity");
    let prdAbv = document.querySelector("#prd_abv");
    let prdMater = document.querySelector("#prd_mater");
    let prdCateM = document.querySelector("#prd_cate_m");
    let prdCateS = document.querySelector("#prd_cate_s");

    <?php 
    $cateLSelect=$row["category"];
    $prdOriginSelect=$rowDetail["origin"];
    $cateMSelect=$rowDetail["cate_m"];

    echo "let cateLSelect= $cateLSelect;";
    echo "let prdOriginSelect= $prdOriginSelect;";
    echo "let cateMSelect= $cateMSelect;";

    switch($cateLSelect){
      case 1:
        $cateSSelect=$rowDetail["cate_s"];
        echo "let cateSSelect= $cateSSelect;";
        break;
      
      case 3:
      case 4:
        $prdMaterSelect=$rowDetail["mater"];
        echo "let prdMaterSelect= $prdMaterSelect;";

    }
    
    
    ?>
    
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
        if(item.id == cateLSelect){
          optionList += `<option value=${item.id} selected>${item.name}</option>`
        }else{
          optionList += `<option value=${item.id}>${item.name}</option>`
        }
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

    // 初始帶入
    prdOriginWraper.style.display = "none"
    prdBrandWraper.style.display = "none"
    prdAbvWraper.style.display = "none"
    prdCapacityWraper.style.display = "none"
    prdMaterWraper.style.display = "none"
    prdCateMWraper.style.display = "none"
    prdCateSWraper.style.display = "none"

    // 大分類
    switch(parseInt(cateLSelect)){
      case 1:
        prdOriginWraper.style.display = "flex"
        prdBrandWraper.style.display = "flex"
        prdAbvWraper.style.display = "flex"
        prdCapacityWraper.style.display = "flex"
        prdCateMWraper.style.display = "flex"
        prdCateSWraper.style.display = "flex"

        // 小分類
        $.ajax({
          method: "POST",
          url: "../../../api/product/get-prd_cate_s.php",
          dataType: "json",
          data: {
            parentId: cateMSelect
          }
        })
        .done(function(response) {
          let optionList = "<option selected disabled>小分類</option>"; 
          for(let i =0; i<response.length; i++){
            let item= response[i]
            if(item.id == cateSSelect){
              optionList += `<option value=${item.id} selected>${item.name}</option>`
            }else{
              optionList += `<option value=${item.id}>${item.name}</option>`
            }
          }
          prdCateS.innerHTML = optionList
        }).fail(function(jqXHR, textStatus) {
          console.log("Request failed: " + textStatus);
        });

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

        // 材質
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
            if(item.id == prdMaterSelect){
              optionList += `<option value=${item.id} selected>${item.name}</option>`
            }else{
              optionList += `<option value=${item.id}>${item.name}</option>`
            }
          }
          mater.innerHTML += optionList
        }).fail(function(jqXHR, textStatus) {
          console.log("Request failed: " + textStatus);
        });
        break;
    }

    // 中分類
    $.ajax({
      method: "POST",
      url: "../../../api/product/get-prd_cate_M.php",
      dataType: "json",
      data: {
        parentId: cateLSelect
      }
    })
    .done(function(response) {
      let cateM = document.querySelector("#prd_cate_m");
      let optionList = "<option disabled>中分類</option>"; 
      for(let i =0; i<response.length; i++){
        let item= response[i]
        if(item.id == cateMSelect){
          optionList += `<option value=${item.id} selected>${item.name}</option>`
        }else{
          optionList += `<option value=${item.id}>${item.name}</option>`
        }
      }
      cateM.innerHTML = optionList
    }).fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });

    

    //產地
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
        if(item.id == prdOriginSelect){
          optionList += `<option value=${item.id} selected>${item.name}</option>`
        }else{
          optionList += `<option value=${item.id}>${item.name}</option>`
        }
      }
      origin.innerHTML += optionList
    }).fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });

    



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
        let optionList = "<option selected disabled>中分類</option>"; 
        for(let i =0; i<response.length; i++){
          let item= response[i]
          if(item.id == cateMSelect){
            optionList += `<option value=${item.id} selected>${item.name}</option>`
          }else{
            optionList += `<option value=${item.id}>${item.name}</option>`
          }
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
        let optionList = "<option selected disabled>小分類</option>"; 
        for(let i =0; i<response.length; i++){
          let item= response[i]
          optionList += `<option value=${item.id}>${item.name}</option>`
        }
        prdCateS.innerHTML = optionList
      }).fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
      });

    })

    // 送出表單
    function check(){
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
      
      if(prdNumVal=="" || prdNameVal=="" || prdPriceVal=="" || prdStatusVal=="" || prdDiscVal=="" || prdLengthVal=="" || prdWidthVal=="" || prdHeightVal=="" || !parseInt(prdCateLVal)){
        alert("有欄位未填");
        return false; 

      }else if(parseInt(prdCateLVal) == 1){

        if(!parseInt(prdOriginVal) || prdBrandVal=="" || prdCapacityVal=="" || prdAbvVal=="" || !parseInt(prdCateMVal) || !parseInt(prdCateSVal)){
          alert("有欄位未填");
          return false; 
        } else{
          return true; 
        }
        

      }else if(parseInt(prdCateLVal) == 2){

        if(!parseInt(prdOriginVal) || prdBrandVal=="" || prdCapacityVal=="" ||  !parseInt(prdCateMVal)){
          alert("有欄位未填");
          return false; 
        } else{
          return true; 
        }
        

      }else if(parseInt(prdCateLVal) == 3 || parseInt(prdCateLVal) == 4){

        if(!parseInt(prdOriginVal) || !parseInt(prdMaterVal) || prdCapacityVal=="" ||  !parseInt(prdCateMVal) ){
          alert("有欄位未填");
          return false; 
        } else{
          return true; 
        }
        

      }else{
        return true;
      }
    

      switch(parseInt(prdStatusVal)){
        case 1:
          alert("確認上架商品？");
          break;
        case 2:
          alert("確認下架商品？");
      }
    }
    
    
  </script>

  <script>
    // 預帶入原本圖片
    $(".img_container").css('display', "flex");
          
    $("#prdImg_show").attr('src', '../../../assets/img/test/<?= $row["main_img"]?>');


    // 圖片預覽
    $("#prdImg").change(function(){

      readURL(this);

      

    });

    function readURL(input){
      if(input.files && input.files[0]){
        
        var reader = new FileReader();
        
        reader.onload = function (e) {
          $(".img_container").css('display', "flex");
          
          $("#prdImg_show").attr('src', e.target.result);

        }

        reader.readAsDataURL(input.files[0]);

      }

    }

  </script>
</body>
</html>