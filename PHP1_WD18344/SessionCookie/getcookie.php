<?php
//echo $_COOKIE["username"];

if($_COOKIE["username"] == "admin"){
    echo "Xin chào " . $_COOKIE["username"] . " đây là trang quản trị";
}else {
    echo "Bạn không đủ quyền để truy cập vào trang quản trị";
}