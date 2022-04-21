<?php
require("../../../db-connect.php");
$id = $_GET["id"];

$sql ="SELECT * FROM bartd_list
WHERE id = $id";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// foreach($rows as $row):
var_dump($rows);
echo "<hr>";


$sql ="SELECT * FROM bartd_cate_list
WHERE bartd_id = $id";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// foreach($rows as $row):
var_dump($rows);
echo "<hr>";

$sql ="SELECT * FROM bartd_material
WHERE bartd_id = $id";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// foreach($rows as $row):
var_dump($rows);
echo "<hr>";

?>
