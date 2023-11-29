<?php
//Session và và cookie lưu trữ thông tin tạm thời
//session bị xóa khi đóng trình duyệt, hoặc thực hiện xóa session
//thông tin session được lưu trữ ử phía serve
//Sẽ hết hạn khi mà người dùng thoát trình duyệt
//Đi phỏng vấn session và cookie hỏi (90%)

session_start(); // Đặt trước các thẻ HTML, các lệnh echo,prrint
$_SESSION["username"] = "admin";

//Xóa session

// cách 1: đóng trình duyệt => session sẽ hết hạn

//$_SESSION["username"] = ""; // cách 2 : Khai báo cho session 1 giá trị rỗng

//unset($_SESSION["username"]);  // cách 3: sử dụng hàm unset để xóa session

//session_destroy();  // cách 4: sử dụng hàm session_destroy để xóa session

//session_unset();   // xóa toàn bộ session

echo '<a href="getsession.php">session</a>';



?>