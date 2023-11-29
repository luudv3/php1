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
    <title>Thêm Nhân Viên</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <!-- Đầu mỗi trường nhập liệu đều có một nhãn để mô tả -->
    <p>Tên Nhân Viên</p><input type="text" name="ten_nhanVien" id="">
    <p>Năm Sinh</p><input type="text" name="namSinh" id="">
    <p>Giới Tính</p><input type="text" name="gioiTinh" id="">
    <p>Ảnh</p><input type="file" name="image" id="">
    <p>Quê Quán</p><input type="text" name="queQuan" id="">
    <p>Email</p><input type="text" name="email" id="">
    <p>Số Điện Thoại</p><input type="text" name="soDienThoai" id="">
    <p>ID Phòng Ban</p>
    <!-- Sử dụng select để chọn ID của phòng ban -->
    <select name="id_phongBan" id="">
        <?php
            include_once 'connection.php';
            $sql = "SELECT * FROM phongban "; // Truy vấn dữ liệu từ bảng phòng ban
            $kq = $conn->query($sql);
            foreach($kq as $row) {
        ?>
            <!-- Hiển thị danh sách các phòng ban để chọn -->
            <option value="<?php echo $row['id_phongBan']?>"><?php echo $row['ten_phongBan']?></option>
        <?php
            }
        ?>
    </select>
    <!-- Nút để gửi thông tin -->
    <input type="submit" value="Thêm" name="gui">
</form>
<?php
if(isset($_POST['gui'])){
    // Lấy thông tin từ các trường nhập liệu
    $ten_nhanVien = $_POST['ten_nhanVien'];
    $namSinh = $_POST['namSinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $queQuan = $_POST['queQuan'];
    $email = $_POST['email'];
    $soDienThoai = $_POST['soDienThoai'];
    $id_phongBan = $_POST['id_phongBan'];
    $name_img=$_FILES['image']['name'];
    $tmp_img=$_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_img,'img/'.$name_img);

    include_once 'connection.php'; // Kết nối tới cơ sở dữ liệu
    // Tạo câu truy vấn để thêm thông tin vào bảng nhanvienthi
    $sql_insert = "INSERT INTO nhanvien (ten_nhanVien, namSinh, gioiTinh, image, queQuan, email, soDienThoai, id_phongBan) 
                   VALUES ('$ten_nhanVien', '$namSinh', '$gioiTinh', '$name_img', '$queQuan', '$email', '$soDienThoai', '$id_phongBan')";
    $result = $conn->prepare($sql_insert);

    if($result->execute()){
        header('location:index.php'); // Chuyển hướng sau khi thêm thành công
    } else {
        echo "Không thêm được";
    }
}
?>
</body>
</html>
