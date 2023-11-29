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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];  // Lấy thông tin từ biểu mẫu
        $email = $_POST['email']; // lấy giá trị email từ form
        $status = $_POST['status']; // lấy giá trị trạng thái từ form

        if(isset($_FILES["fileToUpload"])){
            // đưa hình ảnh thư mục img
            $targret_dir = "img/";
            // lấy tên file ảnh
            $img = $_FILES["fileToUpload"] ["name"];
            //Tạo đường dẫn 
            $target_img = $targret_dir . $img;
            //move_uploaded_file: hàm hỗ trợ khi làm việc với file
            //htmlspecialchars: hỗ trợ để chuyển đổi các ký tự đặc biệt
            if(move_uploaded_file($_FILES["fileToUpload"] 
            ["tmp_name"], $target_img)) {
                echo "Tệp " . htmlspecialchars($img) . 
                " đã được tải lên";
                // lấy đường dẫn lưu vào CSDL
                $img = $target_img;
            }
            else {
                echo "đã có lỗi khi tải lên";
            }
        }

        $sql = "INSERT INTO user (name, email, status, img) VALUES (:name, :email, :status, :img)";
        //Thực hiện chuẩn bị truy vấn CSDL
        $stmt = $conn->prepare($sql);

        if ($stmt->execute([':name' => $name, ':email' => $email, ':status' => $status, ':img' => $img])){
            //Nếu thành công, chuyển hướng tới trang index
            header("Location: index.php");
            exit();
        }
        else {
            // xử lý lỗi nếu việc chèn thông tin thất bại
            //sẽ hiển thị lỗi
            echo "error: " . $stmt->errorInfo()[2];
        }
    }
    ?>
    <h1>Thêm sinh viên</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method = "post" enctype= "multipart/form-data" >
        <label >Tên: <input type="text" name="name"></label> <br>
        <label >Email <input type="email" name="email"></label> <br>
        <label >Ảnh đại diện <input type="file" name="fileToUpload"></label>
        <label >Trạng thái</label>
        <select name="status">
            <option value="0">Hoạt động</option>
            <option value="1">dừng hoạt động</option>
        </select> <br>
        <input type="submit" value="Thêm">
    </form>
</body>
</html>