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
    <title>酒譜清單</title>
    <?php require("../../component/headerLayout.php") ?>
</head>

<body>
    <?php require("../../component/header.php") ?>
    <?php require("../../component/sidemenu.php") ?>
    <div class="container py-5">
        <h2>商品列表</h2>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="form-floating mb-3">
                <input type="text" class="form-control round-0 border-0 border-bottom" id="searchInput">
                <label for="searchInput">search</label>
            </div>
            <div>
                <a class="btn btn-primary" href="bartdinfo.php">新增商品</a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <td>序號</td>
                    <td class="text-center">圖片</td>
                    <td>名稱</td>
                    <td class="text-end">功能列</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM bartd_list";
                $result = $conn->query($sql);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($rows as $row) :
                ?>
                    <tr>
                        <td><?= $row['id'] ?></td>

                        <td class="prd-list_img">
                            <img class="img-fluid " src="../../../assets/img/test/<?=$row['img']?>" alt="">
                        </td>
                        <td><?= $row['name'] ?></td>
                        <td class="text-end">
                            <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                            <a class="px-2" href=""><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

    <?php require("../../component/footerLayout.php") ?>
</body>

</html>