<?php
session_start();
//echo $_SESSION["username"];

if($_SESSION["username"] == "admin"){
    echo "Xin chào " . $_SESSION["username"] . " đây là trang quản trị";
}else {
    echo "Bạn không đủ quyền để truy cập vào trang quản trị";
}
?>