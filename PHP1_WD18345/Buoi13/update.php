<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("connection.php");
  
      //Kiểm tra id có tồn tại hay không?
      if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // Lấy thông tin cần chỉnh sửa từ CSDL
    $sql = " SELECT * FROM students WHERE id = :id";
    //Thực hiện truy vấn SQL để lấy dữ liệu
    //$sql = "SELECT * FROM user";
    //Thực hiện chuẩn bị truy vấn CSDL
    $stmt = $conn->prepare($sql);
    //Lấy tất cả các kết quả lưu vào CSDL
    $stmt->execute([':id' => $id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$student){
        echo "Người dùng không tồn tại";
        exit();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];  // Lấy thông tin từ biểu mẫu
        $age = $_POST['age']; 
        $img = $_POST['img']; 
        $mota = $_POST['mota']; 
        $ngaytao = $_POST['ngaytao']; 
        $img = "";

        // Nếu không có lỗi, thực hiện lưu vào CSDL
            if (isset($_FILES['fileToUpload']) && $_FILES["fileToUpload"]["tmp_name"]) {
                // Thư mục để lưu file ảnh
                $target_dir = "img/";
                // Lấy tên của tệp ảnh từ form
                $img = $_FILES["fileToUpload"]["name"];
                // Tạo đường dẫn đầy đủ từ tệp ảnh
                $target_img = $target_dir . $img;
                // Di chuyển đươc file ảnh
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_img)) {
                    echo "Tệp " . htmlspecialchars($img) . " đã được tải lên thành công";
                    // Lưu trữ ảnh vào CSDL
                    $img = $target_img;
                } else {
                    echo "Đã xảy ra lỗi khi tải tệp lên";
                }
            }
            else
            {
                //nếu như không cập nhật thì giữ nguyên ảnh cũ
                $img = $student['img'];
            }

            // Thực hiện chuẩn bị truy vấn CSDL
            $sql = "UPDATE students SET name = :name, age = :age, img = :img, img = :img , mota =: mota, ngaytao = :ngaytao WHERE id =:id";
            $stmt = $conn->prepare($sql);

            if ($stmt->execute([':name' => $name, ':age' => $age, ':img' => $img, ':mota' => $mota, ':ngaytao' => $ngaytao, ':id' => $id])){
                // Nếu thành công, chuyển hướng tới trang index
                header("Location: index.php");
                exit();
            } else {
                // Xử lý lỗi nếu việc chèn thông tin thất bại
                // Sẽ hiển thị lỗi
                echo "error: " . $stmt->errorInfo()[2];
            }
        }

    ?>
         <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
        <a href="index.php">Về trang danh sách</a><br><br>
        <label for="">Họ tên: <input type="text" name="name" value="<?php echo $student['name'] ?>"> </label><br><br>
        <label for="">Tuổi: <input type="text" name="age" value="<?php echo $student['age'] ?>"> </label><br><br>
        <label for="">Ảnh đại diện: <img src="<?php echo $student['img']; ?>" alt="" width="100px"> </label>
        <input type="file" name="fileToupLoad"> <br><br>
        <label for="">Mô tả sinh viên: <input type="text" name="description" value="<?php echo $student['mota'] ?>"></label><br><br>
        <input type="submit" name="save" value="Lưu">
    </form>
</body>
</html>