<?php
session_start();

if(!$_POST["email"]){
    echo "error";
    exit;
}
require_once("../../../db-connect.php");

$email=$_POST["email"];
$password=$_POST["password"];
$password=md5($password);


$sql="SELECT * FROM user_list JOIN user_pwd ON user_pwd.user_id = user_list.id WHERE email='$email' AND passwd='$password'";
$result = $conn->query($sql);

$resultCount=$result->num_rows;




if($resultCount>0){
    $user=$result->fetch_assoc();
    $role=$user['vip_level'];

    $_SESSION["user"]=[
        "id"=>$user["id"],
        "name"=>$user["name"],
        "email"=>$user["email"],
        "phone"=>$user["phone"],
        "role"=>$user["vip_level"]
    ];


    

    if($role==1){
      header("location: ../../page/product/prdList.php");
    }else{
      header("location: ../homePage.php");
    }
  

}else{
    // echo "登入失敗";
    if(!isset($_SESSION["error"]["times"])){
        $times=1;
    }else{
        $times=$_SESSION["error"]["times"]+1;
    }
    $_SESSION["error"]["times"]=$times;
    $_SESSION["error"]["message"]="帳號或密碼錯誤";

    if($role==1){
      header("location: ../admin-sign-in.php");

    }else{
      header("location: ../user-sign-in.php");
    }


}


?>