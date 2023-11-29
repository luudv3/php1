<?php
//Cookie dùng để lưu trữ thông tin(tài khoản người dùng, thông tin giỏ hàng) trong thời gian nhất định
// cookie sẽ bị xóa khi hết hạn
// lưu trữ trong 1 khoảng thời gian nhất định

// Set cookie
setcookie("username", "admin", time() + 10 * 60);

//xóa cookie
//setcookie("username", "admin", time() - 10 * 60); // xóa thời gian của cookie

//setcookie("username");
echo '<a href="getcookie.php">cookie</a>';


// Tạo trang đăng nhập và trang chủ
// tạo form đăng nhập yêu cầu người dùng nhập tên đăng nhập và mật khẩu
// xác thực thông tin
// nếu như đăng nhập thành công thì lữu trữ thông tin người dùng (tên người dùng)
// session hoặc cookie để người dùng có thể đăng nhập lại khi truy cập vào trang khác
// trong cùng 1 phiên làm việc
// hiển thị thông tin chào mừng bạn đã đến với trang web của chúng tôi