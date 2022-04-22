<?php
require("../../../db-connect.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

$sql = "SELECT * FROM bartd_list";
$result = $conn->query($sql);

$rows = $result->fetch_all(MYSQLI_ASSOC);
$total = $result->num_rows;
// echo $total;
$per_page = 1;

$page_count = CEIL($total / $per_page);
$start = ($p - 1) * $per_page;
// echo $page_count;

$sql = "SELECT * FROM bartd_list
LIMIT $start,$per_page";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// if(isset($_GET["searchType"]) && isset($_GET["searchInput"])){
//   $searchType = $_GET["searchType"];
//   $searchInput = $_GET["searchInput"];


//   $sql="SELECT id, prd_num, name, main_img, price, status FROM prd_list 
//   WHERE $searchType LIKE '%$searchInput%' AND status!=3";
//   $result = $conn->query($sql);
//   $rows = $result->fetch_all(MYSQLI_ASSOC);

//   $total=$result->num_rows;
//   $per_page=3;

//   $page_count=CEIL($total/$per_page);
//   $start=($p-1)*$per_page;

//   $sql="SELECT id, prd_num, name, main_img, price, status FROM prd_list 
//   WHERE $searchType LIKE '%$searchInput%' AND status!=3
//   LIMIT $start,$per_page";

//   $result = $conn->query($sql);
//   $rows = $result->fetch_all(MYSQLI_ASSOC);



// } else{

//   $sql="SELECT id, prd_num, name, main_img, price, status FROM prd_list WHERE status!=3";
//   $result = $conn->query($sql);
//   $rows = $result->fetch_all(MYSQLI_ASSOC);

//   $total=$result->num_rows;
//   $per_page=3;

//   $page_count=CEIL($total/$per_page);
//   $start=($p-1)*$per_page;

//   $sql="SELECT id, prd_num, name, main_img, price, status FROM prd_list 
//   WHERE status!=3 
//   LIMIT $start,$per_page";
//   $result = $conn->query($sql);
//   $rows = $result->fetch_all(MYSQLI_ASSOC);
// }

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
            <form class="py-3" action="./prdList.php" method="get">
                <div class="d-flex ">
                    <div class="me-2">
                        <select class="form-control round-0 border-0 border-bottom w-auto" name="searchType" id="searchType">
                            <option disabled <?php if (!isset($_GET["searchType"]) || !isset($_GET["searchInput"])) : ?>selected<?php endif; ?>>搜索類型</option>
                            <option value="prd_num" <?php if (isset($_GET["searchType"]) && isset($_GET["searchInput"])) : ?><?= ($searchType == 'prd_num' ? 'selected' : '') ?><?php endif; ?>>編號</option>
                            <option value="name" <?php if (isset($_GET["searchType"]) && isset($_GET["searchInput"])) : ?><?= ($searchType == 'name' ? 'selected' : '') ?><?php endif; ?>>名稱</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="search" name="searchInput" <?php if (isset($_GET["searchType"]) && isset($_GET["searchInput"])) : ?>value="<?= $searchInput ?>" <?php endif; ?>>
                        <button class="btn btn-secondary  round-0" type="submit" id="searchBtn">搜尋</button>
                    </div>
                </div>
            </form>
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
                for($i=0; $i<count($rows); $i++):
                ?>
                    <tr>
                        <td><?= $rows[$i]['id'] ?></td>

                        <td class="prd-list_img">
                            <img class="img-fluid " src="../../../assets/img/test/<?= $rows[$i]['img'] ?>" alt="">
                        </td>
                        <td><a href="/ispan-team5/view/page/bartd/bartd-content.php?id=<?= $rows[$i]['id'] ?>"><?= $rows[$i]['name'] ?></a></td>
                        <td class="text-end">
                            <a class="px-2" href=""><i class="fa-solid fa-pen"></i></a>
                            <a class="px-2" oncilck="delconfirm()" href=""><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active"; ?>">
                        <a class="page-link " href="./bartd-list.php?p=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div>

    <?php require("../../component/footerLayout.php") ?>

</body>

</html>