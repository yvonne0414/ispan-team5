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
  <?php require("../../component/headerLayout.php") ?>
  <style>
    .form-label {
      width: 100px;
    }

    .prd_origin-wraper,
    .prd_brand-wraper,
    .prd_capacity-wraper,
    .prd_abv-wraper,
    .prd_mater-wraper,
    .prd_cate_m-wraper,
    .prd_cate_s-wraper {
      display: none;
    }
  </style>
</head>

<body>
  <?php require("../../component/header.php") ?>
  <?php require("../../component/sidemenu.php") ?>
  <div class="container py-5">

    <h2>新增酒譜</h2>

    <form action="" class="d-flex flex-wrap mt-4">
      <div class="d-flex align-items-center w-100 pe-4 mb-3">
        <div>
          <label for="prd_num" class="form-label mb-0">酒譜名稱</label>
        </div>
        <div class="flex-grow-1">
          <input type="text" class="form-control" name="prd_num" id="prd_num">
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
          <input type="text" class="form-control" name="prd_brand" id="prd_brand">
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
          <input type="text" class="form-control" name="prd_capacity" id="prd_capacity" placeholder="ml">
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
      <!-- 圖片 -->
      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="prd_img" class="form-label mb-0">商品圖片</label>
        </div>
        <div class="flex-grow-1">
          <input type="file" class="form-control" name="prd_img[]" id="prd_img" multiple>
        </div>
      </div>
      <!-- 內容 -->
      <div class="d-flex align-items-center w-100 pe-4 mb-3">
        <div>
          <label for="prd_disc" class="form-label mb-0">商品描述</label>
        </div>
        <div class="flex-grow-1">
          <textarea class="form-control" id="prd_disc" rows="3"></textarea>
          <!-- <div id="prd_disc"></div> -->
        </div>
      </div>
      <div class="w-100 text-center">
        <button class="btn btn-outline-primary">取消</button>
        <button class="btn btn-primary" type="" id="prd_submit">確定</button>
      </div>
    </form>
  </div>

  <?php require("../../component/footerLayout.php") ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    let prdCateL = document.querySelector("#prd_cate_l");
    //呼叫產品大分類
    $.ajax({
        method: "POST",
        url: "../../../api/bartd/get-bartd_master_cate_l.php",
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
  </script>
</body>

</html>