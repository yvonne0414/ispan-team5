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
  <?php require("../../component/headerLayout.php")?>
  <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
  <style>
    .form-label{
      width: 100px;
      
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
          <label for="" class="form-label mb-0">商品編號</label>
        </div>
        <div class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_num" id="prd_num">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">商品名稱</label>
        </div>
        <div  class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_name" id="prd_name">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">商品價格</label>
        </div>
        <div class="flex-grow-1">
          <input type="number"  class="form-control" name="prd_price" id="prd_price">
        </div>
      </div>
      <div class="d-flex align-items-center w-100 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">商品描述</label>
        </div>
        <div  class="flex-grow-1">
          <div id="prd_disc"></div>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="" class="form-label mb-0">商品材積</label>
        </div>
        <div class="d-flex align-items-center">
          <input type="number"  class="form-control" placeholder="長(mm)" name="prd_length" id="prd_length">
          <span class="mx-3">:</span>
          <input type="number"  class="form-control" placeholder="寬(mm)" name="prd_width" id="prd_width">
          <span class="mx-3">:</span>
          <input type="number"  class="form-control" placeholder="高(mm)" name="prd_height" id="prd_height">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">庫存數量</label>
        </div>
        <div class="flex-grow-1">
          <input type="number"  class="form-control" name="prd_height" id="prd_height">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">銷售數量</label>
        </div>
        <div class="flex-grow-1">
          <input type="number"  class="form-control" disabled value="3234">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="" class="form-label mb-0">商品圖片</label>
        </div>
        <div class="flex-grow-1">
          <input type="file"  class="form-control"  name="prd_img" id="prd_img">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="" class="form-label mb-0">商品大分類</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_cate_l" id="prd_cate_l">
            <option selected>請選擇</option>
            <option value="1">基酒</option>
            <option value="2">副材料</option>
            <option value="3">器材</option>
            <option value="4">杯具</option>
          </select>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">產地</label>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="prd_cate_l" id="prd_cate_l">
            <option selected>請選擇</option>
            <option value="1">台灣</option>
            <option value="2">俄羅斯</option>
            <option value="3">法國</option>
          </select>
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">品牌</label>
        </div>
        <div class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_brand" id="prd_brand">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">容量</label>
        </div>
        <div class="flex-grow-1">
          <input type="text"  class="form-control" name="prd_capacity" id="prd_capacity">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">酒精濃度</label>
        </div>
        <div class="flex-grow-1">
          <input type="number"  class="form-control" name="prd_abv" id="prd_abv">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">材質</label>
        </div>
        <div class="flex-grow-1">
          <input type="number"  class="form-control" name="prd_mater" id="prd_mater">
        </div>
      </div>
      <div class="d-flex align-items-center w-50 pe-4 mb-3">
        <div>
          <label for="" class="form-label mb-0">分類</label>
        </div>
        <div class="flex-grow-1 d-flex">
          <select class="form-select" name="prd_cate_m" id="prd_cate_m">
            <option selected>中分類</option>
            <option value="1">伏特加</option>
            <option value="2">威士忌</option>
            <option value="3">香檳</option>
          </select>
          <select class="form-select ms-3" name="prd_cate_s" id="prd_cate_s">
            <option selected>小分類</option>
            <option value="1">特選伏特加</option>
            <option value="2">高濃度伏特加</option>
            <option value="3">頂級伏特加</option>
          </select>
        </div>
      </div>
    </form>
  </div>

  <?php require("../../component/footerLayout.php")?>
  <script>
    ClassicEditor
      .create( document.querySelector( '#prd_disc' ) )
      .then( editor => {
              console.log( editor );
      } )
      .catch( error => {
              console.error( error );
      } );
  </script>
</body>
</html>