<!-- 拉下來後這個檔案不要上傳 -->
<?php
// 連接資料庫
$serername = "localhost";
$username = "admin";
$password = "12345"; // 寫自己的密碼
$dbname = "9hunters_db";

$conn = new mysqli($serername, $username, $password, $dbname);

// 檢查連線
if ($conn->$conn_error) {
  die("連線失敗：".$conn->$conn_error);
}else {
  // echo "連線成功";
}


?>
