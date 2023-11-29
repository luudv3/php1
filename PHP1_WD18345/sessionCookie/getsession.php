<?php
session_start();
//echo $_SESSION["username"];

if($_SESSION["username"] == "admin"){
    echo "xin chào " . $_SESSION["username"] . " đây là trang quản trị";
}
else{
    echo "Bạn không có quyền truy cập vào trang quản trị";
}
?>