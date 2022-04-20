<?php
require("../../../db-connect.php");
$sql="INSERT INTO group_list(name,disc,user_id) VALUE($,) ";

?>
<?php
    $date = '';
    $date1 = '';
    $date2 = '';
    if (isset($_GET['start_time']) && isset($_GET['end_time']) && isset($_GET['activity_start_time'])) {
        $date = $_GET['start_time'];
        $date1 = $_GET['end_time'];
        $date2 = $_GET['activity_start_time'];
    }
?>
    <form action="" method="get" class="NoPrint mt-5">
    <div>
    <label for="start_time" class="form-label mb-0">開團日期</label>
    
    <input class="mt-3" type="date" name="start_time"
        value="<?= $date ?>">
    </div>
    <?php
    if (isset($_GET['start_time'])) {
        echo '?start_time=' . $date . '&start_time=' . $date;
    }
    ?>
    <br>
    <div>
    <label for="end_time" class="form-label mb-0">結束日期</label>

    <input class="mt-3" type="date" name="end_time"
        value="<?= $date1 ?>">
    </div>    
    <?php
    if (isset($_GET['end_time'])) {
        echo '?end_time=' . $date1 . '&end_time=' . $date1;
    }
    ?>
    <br>
    <div>
    <label for="activity_start_time" class="form-label mb-0">活動日期</label>
    
    <input class="mt-3 mb-5" type="date" name="activity_start_time"
        value="<?= $date2 ?>">
    </div>    
    <?php
    if (isset($_GET['activity_start_time'])) {
        echo '?activity_start_time=' . $date2 . '&activity_start_time=' . $date2;
    }
    ?>
    </form>