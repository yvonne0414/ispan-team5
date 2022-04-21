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
        #rule_min,
        #rule_max,
        #coupon_type,
        #user_level,
        #start_time,
        #end_time {
            width: 300px;
        }
    </style>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">

        <h2>優惠折扣券</h2>

        <form action="doCoupon.php" class="d-flex flex-wrap mt-4" method="post">
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
                    <input type="number" class="form-control me-1" name="min" id="rule_min" value="">

                    <span class="mx-2 my-2">~</span>
                    <input type="text" class="form-control me-1" name="max" id="rule_max" value="">
                    <span class="my-2"> 元</span>
                </div>
            </div>

            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="start_time" class="form-label mb-0 me-2">開始日期</label>
                </div>
                <div class="flex-grow-1 d-flex">
                    <input type="date" class="form-control me-1" name="start_time" id="start_time" value="">

                </div>
            </div>
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="end_coupon" class="form-label mb-0 me-2">結束日期</label>
                </div>
                <div class="flex-grow-1 d-flex">
                    <input type="date" class="form-control me-1" name="end_time" id="end_time" value="">

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

   
    
</body>

</html>