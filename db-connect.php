<?php
//拉下來後這個檔案不要上傳
// 連接資料庫
$serername = "localhost";
$username = "admin";
$password = "12345"; // 寫自己的密碼
$dbname = "9hunters_db";

// 檢查連線
$conn = new mysqli($serername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("連線失敗: " . $conn->connect_error);
}
//echo "連結DB成功<br>";

?>
