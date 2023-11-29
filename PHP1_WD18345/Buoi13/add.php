<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
</head>
<body>
    <?php
    include("connection.php");
    $nameErr = $emailErr = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];  // Lấy thông tin từ biểu mẫu
        $email = $_POST['email']; // lấy giá trị email từ form
        $status = $_POST['status']; // lấy giá trị trạng thái từ form
        $img = "";

        // Validate tên
        if (empty($name)) {
            $nameErr = "Họ tên không được để trống";
        }

        // Validate email
        if (empty($email)) {
            $emailErr = "Email không được để trống";
        }

        // Nếu không có lỗi, thực hiện lưu vào CSDL
        if (empty($nameErr) && empty($emailErr)) {
            if (isset($_FILES['fileToUpload'])) {
                // Thư mục để lưu file ảnh
                $target_dir = "img/";
                // Lấy tên của tệp ảnh từ form
                $img = $_FILES["fileToUpload"]["name"];
                // Tạo đường dẫn đầy đủ từ tệp ảnh
                $target_img = $target_dir . $img;
                //Kiểm tra định dạng file ảnh
                $imgFileType = strtolower(pathinfo($target_img, PATHINFO_EXTENSION));
                if($imgFileType == "jpg" || $imgFileType == "png"){
                // Di chuyển đươc file ảnh
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_img)) {
                    echo "Tệp " . htmlspecialchars($img) . " đã được tải lên thành công";
                    // Lưu trữ ảnh vào CSDL
                    $img = $target_img;
                } else {
                    echo "Đã xảy ra lỗi khi tải tệp lên";
                }
            }
        }
            // Thực hiện chuẩn bị truy vấn CSDL
            $sql = "INSERT INTO user (name, email, status, img) VALUES (:name, :email, :status, :img)";
            $stmt = $conn->prepare($sql);

            if ($stmt->execute([':name' => $name, ':email' => $email, ':status' => $status, ':img' => $img])) {
                // Nếu thành công, chuyển hướng tới trang index
                header("Location: index.php");
                exit();
            } else {
                // Xử lý lỗi nếu việc chèn thông tin thất bại
                // Sẽ hiển thị lỗi
                echo "error: " . $stmt->errorInfo()[2];
            }
        }
    }
    ?>
    <h1>Thêm sinh viên</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <label>Tên: <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>"></label>
        <span><?php echo $nameErr; ?></span> <br>

        <label>Email <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>"></label>
        <span><?php echo $emailErr; ?></span> <br>

        <label>Ảnh đại diện <input type="file" name="fileToUpload"></label> <br>

        <label>Trạng thái</label>
        <select name="status">
            <option value="0">Hoạt động</option>
            <option value="1">Dừng hoạt động</option>
        </select> <br>
        <input type="submit" value="Thêm">
        <input type="reset" value="reset">
    </form>
    <a href="index.php">Quay lại trang chủ</a>
</body>
</html>
