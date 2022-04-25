<?php
require("../../../db-connect.php");
$id=$_GET["id"];

$sql = "SELECT * FROM coupon_list WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


// echo "row";
// echo "<br>";
// var_dump($row);
$sql = "SELECT * FROM vip_level";
$result = $conn->query($sql);
$vips_level = $result->fetch_all(MYSQLI_ASSOC);
// echo "<br>";
// echo "vips_level";
// echo "<br>";
// var_dump($vips_level);

$sql = "SELECT * FROM coupon_cate";
$result = $conn->query($sql);
$coupons_cate = $result->fetch_all(MYSQLI_ASSOC);

$id=$_GET["id"];
//var_dump($coupons_cate);
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
        #coupon_cate,
        #vip_level,
        #start_time,
        #end_time {
            width: 400px;
        }
    </style>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">

        <h2>優惠編輯</h2>

        <form action="updateCoupon.php" class="d-flex flex-wrap mt-4" method="post">
                <input class="form-control" type="hidden" aria-label="readonly input example" readonly value=<?= $id ?> name="coupon_id" id="coupon_id">

            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div class="mb-3">
                    <label for="coupon_name" class="form-label me-2">優惠券名稱</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" name="name" type="text" value="<?= $row["name"] ?>">
                </div>
            </div>
            <div class="d-flex align-items-center pe-4 w-50 me-3">
                <div class="mb-3">
                    <label for="vip_level" class="form-label me-2">會員等級</label>
                </div>
                <div class="mb-3">
                    <select class="form-select form-select-md " name="vip_level" id="vip_level">
                       <?php  
                        for($i=1; $i<count($vips_level); $i++): ?>

                        <option   <?=
                        $row["vip_level"] == $vips_level[$i]["id"] ?  "selected" : "";
                        ?> value= <?= $vips_level[$i]["id"] ?>><?= $vips_level[$i]["name"] ?></option>
                     

                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <!-- coupon_cate -->
            <div class="d-flex align-items-center w-50 pe-4 me-3">
                <div class="mb-3">
                    <label for="coupon_cate" class="form-label me-2">優惠種類</label>
                </div>
                <div class="mb-3">
                    <select class="form-select form-select-md " name="coupon_cate" id="coupon_cate" value="<?= $row["coupon_cate"] ?>">
                    <?php  
                        foreach($coupons_cate as $cate): ?>
                        <option   <?php echo
                        $cate["id"] == $row["coupon_cate"] ?  "selected" : "";
                        ?> value= <?= $cate["id"] ?>><?= $cate["name"] ?></option>
                     

                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center w-50 pe-4 mb-3">
                <div>
                    <label for="discount" class="form-label mb-0 me-2">優惠折扣</label>
                </div>
                <div class="flex-grow-1">
                    <input class="form-control" name="discount" type="num" value="<?= $row["discount"] ?>">
                </div>
            </div>

            <!-- coupon_rule -->
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="coupon_line" class="form-label mb-0 me-2">優惠金額限制</label>
                </div>
                <div class="flex-grow-1 d-flex">
                <input class="form-control"
                            name="rule_min"
                            type="number" value="<?= $row["rule_min"] ?>">

                    <span class="mx-2 my-2">~</span>
                    <input class="form-control"
                            name="rule_max"
                            type="number" value="<?= $row["rule_max"] ?>">
                    <span class="my-2"> 元</span>
                </div>
            </div>

            <!-- start_time -->
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="start_time" class="form-label mb-0 me-2">開始日期</label>
                </div>
                <div class="flex-grow-1 d-flex">
                <input class="form-control"
                            name="start_time"
                            type="date" value="<?= $row["start_time"] ?>">
                </div>
            </div>

            <!-- end_time -->
            <div class="d-flex align-items-center w-100 pe-4 mb-3">
                <div>
                    <label for="end_time" class="form-label mb-0 me-2">結束日期</label>
                </div>
                <div class="flex-grow-1 d-flex">
                <input class="form-control"
                            name="end_time"
                            type="date" value="<?= $row["end_time"] ?>">

                </div>
            </div>
            <!-- submit -->
            <div class="w-100 text-center">
                <a class="btn btn-outline-dark" href="couponList.php">取消</a>

                <!-- Button trigger modal -->
                <button class="btn btn-dark py-2 px-3 " type="submit">
                修改</button>
            </div>
        </form>
    </div>


    <?php require("../../component/footerLayout.php") ?>



</body>

</html>