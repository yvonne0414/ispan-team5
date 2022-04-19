<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../component/headerLayout.php">
  <title>酒譜詳情</title>
  <?php require("../component/headerLayout.php") ?>
</head>

<body>
  <?php require("../component/header.php") ?>
  <?php require("../component/sidemenu.php") ?>
  <div class="container">
    <div class="row py-3">
      <div class="col-12">
        <h3>新增酒譜</h3>
      </div>
    </div>
    <div class="row">

      <div class="col-6">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">酒譜名稱</span>
          </div>
          <input type="text" class="form-control" placeholder="酒譜名稱" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </div>
      <div class="col-6"></div>
      <div class="col-10">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">內容材料</span>
          </div>
          <input type="text" class="form-control" placeholder="材料名稱" aria-label="Username" aria-describedby="basic-addon1">
          <input type="text" class="form-control" placeholder="材料比例" aria-label="Username" aria-describedby="basic-addon1">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">商品分類</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01">
            <option selected>商品分類</option>
            <option value="1">基酒類</option>
            <option value="2">副材料</option>
          </select>
          <!-- 基酒選項 -->
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">基酒類</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01">
            <option selected>Choose...</option>
            <option value="1">伏特加</option>
            <option value="2">蘭姆酒</option>
            <option value="3">白蘭地</option>
            <option value="4">香甜酒</option>
            <option value="5">琴酒</option>
            <option value="6">龍舌蘭</option>
            <option value="7">威士忌</option>
            <option value="8">其他</option>
          </select>
        </div>
      </div>
      <div class="col-10">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">內容材料</span>
          </div>
          <input type="text" class="form-control" placeholder="材料名稱" aria-label="Username" aria-describedby="basic-addon1">
          <input type="text" class="form-control" placeholder="材料比例" aria-label="Username" aria-describedby="basic-addon1">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">商品分類</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01">
            <option selected>商品分類</option>
            <option value="1">基酒</option>
            <option value="2">副材料</option>
          </select>
          <!-- 基酒選項 -->
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">副材料</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01">
            <option selected>Choose...</option>
            <option value="1">調味材料</option>
            <option value="2">無酒精酒款</option>
            <option value="3">冰塊</option>
            <option value="4">碳酸飲料</option>
            <option value="5">醃漬水果、果乾</option>
            <option value="6">果汁</option>
          </select>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-8">
        <h4>酒譜分類</h4>
      </div>
      <div class="col-8">
        <div class="input-group mb-3 w-100">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01">
            <option selected>Choose...</option>
            <option value="1">類型</option>
            <option value="2">杯形</option>
            <option value="3">調法</option>
            <option value="4">飲用方式</option>
          </select>

          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01">
            <option selected>Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>

      </div>
    </div>
  </div>

  <?php require("../component/footerLayout.php") ?>
</body>

</html>