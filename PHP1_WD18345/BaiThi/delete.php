<?php
session_start(); // Khởi động session (đã lưu đăng nhập)
if (!isset($_SESSION['us']) && !isset($_SESSION['pa'])) { // Kiểm tra xem có đăng nhập hay không
    header('location:index.php'); // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
}

include_once 'connection.php'; // Kết nối với cơ sở dữ liệu

if (isset($_GET['id_nhanVien'])) { // Kiểm tra xem có tham số id_nhanVien được truyền qua URL hay không
    $id = $_GET['id_nhanVien']; // Lấy giá trị của tham số id_nhanVien từ URL

    // Tạo câu truy vấn để xóa thông tin nhân viên với id tương ứng
    $sql_delete = "DELETE FROM nhanvien WHERE id_nhanVien=$id";
    $result = $conn->prepare($sql_delete);

    if ($result->execute()) { // Thực thi truy vấn xóa
        header('location:index.php'); // Chuyển hướng về trang danh sách sau khi xóa thành công
    } else {
        echo "Không thể xóa thông tin nhân viên này!"; // Thông báo nếu không xóa được
    }
}
?>
