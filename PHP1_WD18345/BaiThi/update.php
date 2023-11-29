<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang login.php
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location: login.php');
    exit(); // Kết thúc kịch bản
}

include_once 'connection.php';
if (isset($_GET['id_nhanVien'])) {
    $id = $_GET['id_nhanVien'];
    $sql_select = "SELECT * FROM nhanvien WHERE id_nhanVien = $id";
    $result = $conn->query($sql_select)->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin nhân viên</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="nhanvien_id" value="<?php echo $result['id_nhanVien'] ?>">
        <p>Tên nhân viên</p><input type="text" name="ten_nhanVien" id="" value="<?php echo $result['ten_nhanVien'] ?>">
        <p>Năm sinh</p><input type="text" name="namSinh" id="" value="<?php echo $result['namSinh'] ?>">
        <p>Giới tính</p><input type="text" name="gioiTinh" id="" value="<?php echo $result['gioiTinh'] ?>">
        <p>Ảnh</p><img style="height: 150px; width: 150px;" src="img/<?php echo $result['image'] ?>" alt="">
        <p>Quê quán</p><input type="text" name="queQuan" id="" value="<?php echo $result['queQuan'] ?>">
        <p>Email</p><input type="text" name="email" id="" value="<?php echo $result['email'] ?>">
        <p>Số điện thoại</p><input type="text" name="soDienThoai" id="" value="<?php echo $result['soDienThoai'] ?>">
        <p>ID Phòng ban</p>
        <select name="id_phongBan" id="">
            <?php
            include_once 'connection.php';
            $sql = "SELECT * FROM phongban";
            $kq = $conn->query($sql);
            foreach ($kq as $row) {
            ?>
            <option value="<?php echo $row['id_phongBan'] ?>"
                <?php echo $row['id_phongBan'] == $result['id_phongBan'] ? "selected": "" ?>>
                <?php echo $row['ten_phongBan'] ?>
            </option>
            <?php } ?>
        </select>
        <input type="submit" value="Cập nhật" name="gui">
    </form>
    <?php
    include_once 'connection.php'; // Đảm bảo rằng bạn đã kết nối đến cơ sở dữ liệu
    if (isset($_POST['gui'])) { // Kiểm tra nút "gui" đã được nhấn hay chưa
        $ten_nhanVien = $_POST['ten_nhanVien'];
        $namSinh = $_POST['namSinh'];
        $gioiTinh = $_POST['gioiTinh'];
        $queQuan = $_POST['queQuan'];
        $email = $_POST['email'];
        $soDienThoai = $_POST['soDienThoai'];
        $id_phongBan = $_POST['id_phongBan'];
        // Đoạn dưới đây cần kiểm tra, vì biến $result chưa được định nghĩa ở đâu
        $name_img = $result['image'];
        // Câu truy vấn SQL để cập nhật thông tin nhân viên
        $sql_update = "UPDATE nhanvien SET ten_nhanVien='$ten_nhanVien', namSinh='$namSinh', gioiTinh='$gioiTinh', image='$name_img', queQuan='$queQuan', email='$email', soDienThoai='$soDienThoai', id_phongBan='$id_phongBan' WHERE id_nhanVien=$id";
        $result = $conn->prepare($sql_update); // Chuẩn bị câu truy vấn

        // Thực hiện câu truy vấn và kiểm tra kết quả
        if ($result->execute()) {
            header("location:index.php"); // Chuyển hướng về trang danh sách nhân viên
        } else {
            echo "Không sửa được thông tin nhân viên này!";
        }
    }
?>

</body>

</html>
