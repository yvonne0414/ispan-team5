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
  <title>酒譜新增</title>
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
      display: none;
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

    <h2>新增酒譜</h2>

    <form action="doCreat.php" class="d-flex flex-wrap mt-4" method="POST" enctype="multipart/form-data" onSubmit="return check();">
      <!-- 名稱 -->
      <div class="d-flex align-items-center w-100 pe-4 mb-3">
        <div>
          <label for="prd_num" class="form-label mb-0">酒譜名稱</label>
        </div>
        <div class="flex-grow-1">
          <input type="text" class="form-control" name="bartd_num" id="prd_num">
        </div>
      </div>

      <!-- 材料 -->
      <div class="d-flex align-items-center w-100 pe-4 mb-3 me-1">
        <div>
          <label for="bartd-name" class="form-label mb-0">材料</label>
        </div>
        <!-- 名稱 -->
        <div class="flex-grow-1">
          <input type="text" class="form-control" name="bartd_name" id="bartd-name">
        </div>
        <!-- 比例 -->
        <div class="flex-grow-1">
          <input type="text" class="form-control" name="bartd_ratio" id="bartd-ratio">
        </div>
        <!-- master_cate_l -->
        <div class="flex-grow-1">
          <select class="form-select prd_cate_l" name="prd_cate_l" id="prd_cate_l">
            <option selected>材料類別</option>
          </select>
        </div>
        <!-- master_cate_m -->
        <div class="flex-grow-1">
          <select class="form-select prd_cate_m" name="prd_cate_m" id="prd_cate_m">
            <option selected>請選擇</option>
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
            <option selected>酒譜類別</option>
          </select>
        </div>
        <div class="flex-grow-1">
          <select class="form-select" name="bartd_cate_id_s" id="bartd_cate_id_s">
            <option selected>請選擇</option>
          </select>
        </div>
      </div>

      <!-- image -->


      <div class="d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
          <label for="prdImg" class="form-label mb-0">商品圖片</label>
        </div>
        <div class="flex-grow-1">
          <input type="file" class="form-control" name="bartd_img" id="prdImg" accept=".jpg, .jpeg, .png, .webp, .svg">
        </div>
      </div>
      <div class="justify-content-center align-items-center img_container my-2">
        <img id="prdImg_show" src="#" />
      </div>


      <!-- textarea -->
      <div class="d-flex align-items-center w-100 pe-4 mb-3">
        <div>
          <label for="prd_disc" class="form-label mb-0">商品描述</label>
        </div>
        <div class="flex-grow-1">
          <textarea class="form-control" id="prd_disc" rows="3" name="bartd_content"></textarea>
          <!-- <div id="prd_disc"></div> -->
        </div>
      </div>

      <!-- submit -->
      <div class="w-100 text-center">
        <a class="btn btn-outline-dark" href="bartd-list.php">取消</a>
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
    $.ajax({
        method: "POST",
        url: "../../../api/bartd/get-bartd_cate_id_l.php",
        dataType: "json"
      })
      .done(function(response) {
        let optionList = "";
        for (let i = 0; i < response.length; i++) {
          let item = response[i]
          optionList += `<option value="${item.id}">${item.name}</option>`
        }
        bartdCateM.innerHTML += optionList
      }).fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
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

  <script>
    // 送出表單
    function check() {
      //   // 抓值
      //   let prdNumVal = prdNum.value;
      let prd_num = document.querySelector("#prd_num");
      let bartd_name = document.querySelector("#bartd-name");
      let bartd_ratio = document.querySelector("#bartd-ratio");
      let prd_cate_l = document.querySelector("#prd_cate_l");
      let prd_cate_m = document.querySelector("#prd_cate_m");
      let bartd_cate_id_m = document.querySelector("#bartd_cate_id_m");
      let bartd_cate_id_s = document.querySelector("#bartd_cate_id_s");
      let prdImg = document.querySelector("#prdImg");
      let prd_disc = document.querySelector("#prd_disc");

      let prd_numVal = prd_num.value;
      let bartd_nameVal = bartd_name.value;
      let bartd_ratioVal = bartd_ratio.value;
      let prd_cate_lVal = prd_cate_l.value;
      let prd_cate_mVal = prd_cate_m.value;
      let bartd_cate_id_mVal = bartd_cate_id_m.value;
      let bartd_cate_id_sVal = bartd_cate_id_s.value;
      let prdImgVal = prdImg.value;
      let prd_discVal = prd_disc.value;

      if (prd_numVal == "" || bartd_nameVal == "" || bartd_ratioVal == "" || prd_cate_lVal == "" || prd_cate_mVal == "" || bartd_cate_id_mVal == "" || bartd_cate_id_sVal == "" || prdImgVal == "" || prd_discVal == "") {

        alert("有欄位未填");
        return false;
      } else {
        return true;
      }
    }


    
  </script>

</body>

</html>