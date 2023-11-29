<?php
// Session và cookie đều lưu trữ thông tin TẠM THỜI (Thông tin về tài khoản, giỏ hàng)
// session dùng để lưu trữ trong phiên làm việc (trình duyệt web mở) 
// session lưu trữ thông và gửi dữ liệu lên serve
// session sẽ bị xóa khi đóng trình duyệt, xóa session

session_start(); // Đặt trước các thẻ HTML, echo , print
$_SESSION["username"] = "admin";

//Xóa session
// đóng trình duyệt => session sẽ bị xóa
//$_SESSION["username"] = ""; // cho biến cục bộ 1 giá trị rỗng => session sẽ bị xóa
//unset($_SESSION["username"]);
//session_destroy();
session_unset(); // xóa toàn bộ session

echo '<a href="getsession.php">session</a>';

// tạo 1 trang đăng nhập và trang chủ
// tạo form đăng nhập yêu cầu người dùng nhập thông tin (Tên người dùng và mật khẩu)
// sau khi đăng nhập thành công lưu trữ thông tin qua session hoặc cooie
// hiển thông tin xin chào đã đến với trang web của chúng tôi
?> 