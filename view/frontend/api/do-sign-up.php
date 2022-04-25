<?php
session_start();
require_once("../../../db-connect.php");

$role=$_POST["role"];

if($role==1){
  if(isset($_SESSION["user"])){
    header("location: ../..//page/product/prdList.php");
  }
  
  $name='後台管理員';
  $sex= 'F';
  $age= 20;
  $email=$_POST["email"];
  $password=$_POST["password"];
  $repassword=$_POST["repassword"];
  $phone=$_POST["phone"];
  $address='';


}else{
  if(isset($_SESSION["user"])){
    header("location: ../homePage.php");
  }
  
  $name=$_POST["name"];
  $sex=$_POST["sexRadios"];
  $age=$_POST["age"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $repassword=$_POST["repassword"];
  $phone=$_POST["phone"];
  $address=$_POST["address"];
}





if($password!=$repassword){
    echo "密碼不一致";
    exit;
}

$sql="SELECT * FROM user_list WHERE name='$name'";
$result = $conn->query($sql);
if($result->num_rows>0){
    echo "帳號已存在";
    exit;
}

$now=date('Y-m-d H:i:s');
$password=md5($password);


$sql="INSERT INTO user_list (name, age, gender, email, address, phone, vip_level, create_time) VALUES ('$name', $age, '$sex', '$email', '$address', '$phone', $role, '$now')";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成<br>";
    $last_id=$conn->insert_id;

    $sql="INSERT INTO user_pwd (user_id, passwd) VALUES ($last_id, '$password')";
    
    if ($conn->query($sql) === TRUE) {
    echo "密碼新增完成<br>";
    
    $_SESSION["user"]=[
        "id"=>$last_id,
        "name"=>$name,
        "email"=>$email,
        "phone"=>$phone,
        "role"=>$role
    ];
    
    if($role==1){
      header("location: ../../page/product/prdList.php");
    }else{
      header("location: ../homePage.php");
    }

    
    } else {
        echo "密碼新增錯誤: "  . $conn->error;
        exit;
    }

    
} else {
    echo "新增資料錯誤: "  . $conn->error;
    exit;
}
$conn->close();



?>
