<?php
session_start();
session_destroy();
header("location: /ispan-team5/api/admin-logout.php");
?>