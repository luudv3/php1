<?php

//cookie dùng để lưu trữ dữ liệu trong thời gian nhất định
//cookie sẽ bị xóa khi hết hạn 
// -> lữu trữ thông tin trong khoảng thời gian
// cookie lưu trữ thông tin qua trình duyệt web

// set cookie
setcookie("username", "admin", time() + 10 * 60);

//xóa cookie
setcookie("username");
//setcookie("username", "admin", time() - 10 * 60);  //Xóa thời gian ban đầu
echo '<a href="getcookie.php">cookie</a>';
