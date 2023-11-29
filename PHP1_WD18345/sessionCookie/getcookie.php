<?php
//echo $_COOKIE["username"];

if($_COOKIE["username"] == "admin"){
    echo "xin chào " . $_COOKIE["username"] . " đây là trang quản trị";
}
else{
    echo "Bạn không có quyền truy cập vào trang quản trị";
}