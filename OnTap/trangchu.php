//trangchu.php
<?php
// Kiểm tra xem có cookie "user_name" hay không
if (isset($_COOKIE['user_name'])) {
    // Lấy giá trị của cookie "user_name"
    $username = $_COOKIE['user_name'];
    echo "Xin chào, $username!";
} else {
    echo "Cookie không tồn tại hoặc đã hết hạn.";
}
?>