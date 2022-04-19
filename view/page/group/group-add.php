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
    <title></title>
    <?php require("../../component/headerLayout.php")?>
</head>
<?php
$date = '';
$date1 = '';
if (isset($_GET['get_date']) && isset($_GET['get_date1'])) {
    $date = $_GET['get_date'];
    $date1 = $_GET['get_date1'];
}
?>
<body>
<?php require("../../component/header.php")?>
<?php require("../../component/sidemenu.php")?>
<form action="" method="get" class="NoPrint">輸入日期:
    <input type="date" name="get_date"
           value="<?= $date ?>">

    <?php
    if (isset($_GET['get_date'])) {
        echo '?get_data=' . $date . '&get_data1=' . $date1;
    }
    ?>

    輸入日期:
    <input type="date" name="get_date1"
           value="<?= $date1 ?>">
    <input type="submit" value="送出">

    <?php
    if (isset($_GET['get_date1'])) {
        echo '?get_data1=' . $date1 . '&get_data=' . $date;
    }
    ?>
</form>
</body>
</html>