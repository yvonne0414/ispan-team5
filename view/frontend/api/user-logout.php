<?php
session_start();
session_destroy();

header("location: /ispan-team5/view/frontend/user-sign-in.php");
?>