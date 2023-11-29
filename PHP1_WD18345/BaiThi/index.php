<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang login.php
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location: login.php');
    exit(); // Kết thúc kịch bản
}

// Các mã lệnh xử lý thêm thông tin vào cơ sở dữ liệu và giao diện form ở đây
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân sự</title>
</head>
<body>
    <!-- Tạo bảng để hiển thị thông tin nhân viên -->
    <table border="1" cellspacing=0>
        <tr>
            <!-- Định dạng tiêu đề các cột trong bảng -->
            <th>Nhân viên ID</th>
            <th>Tên nhân viên</th>
            <th>Năm sinh</th>
            <th>Giới tính</th>
            <th>Ảnh</th>
            <th>Quê quán</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>ID Phòng ban</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php 
            // Kết nối đến CSDL
            include_once 'connection.php';
            // Truy vấn dữ liệu từ bảng nhanvienthi
            $sql = "SELECT * FROM nhanvien";
            // $sql = "SELECT n.*, p.ten_phongBan FROM nhanvienthi n
            // LEFT JOIN quanlynhansu p ON n.id_phongBan = p.id_phongBan";
            $kq = $conn->query($sql);
            foreach($kq as $row) {
        ?>
        <tr>
            <!-- Hiển thị thông tin từng cột của nhân viên -->
            <td><?php echo $row['id_nhanVien']?></td>
            <td><?php echo $row['ten_nhanVien']?></td>
            <td><?php echo $row['namSinh']?></td>
            <td><?php echo $row['gioiTinh']?></td>
            <td><img style="width: 150px" src="img/<?php echo $row['image']?>" alt=""></td>
            <td><?php echo $row['queQuan']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['soDienThoai']?></td>
            <td><?php echo $row['id_phongBan']?></td>
            <!-- Tạo link Update và Delete cho mỗi nhân viên -->
            <td><a href="update.php?id_nhanVien=<?php echo $row['id_nhanVien']?>">Update</a></td>
            <td><a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="delete.php?id_nhanVien=<?php echo $row['id_nhanVien']?>">Xóa</a></td>
        </tr>
        <?php }
        ?>
    </table>
    <!-- Tạo link thêm nhân viên mới và đăng xuất -->
    <a href="add.php">Thêm nhân viên</a>
    <a href="logout.php">Đăng xuất</a>
</body>
</html>
