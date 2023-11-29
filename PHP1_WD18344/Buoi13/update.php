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

    // Kiểm tra ID của người dùng truyền qua URL
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql = "SELECT * FROM user WHERE id = :id";
       //Thực hiện chuẩn bị truy vấn CSDL
       $stmt = $conn->prepare($sql);
       //Lấy tất cả các kết quả lưu vào CSDL
       $stmt->execute(['id' => $id]);
       $student = $stmt->fetch(PDO::FETCH_ASSOC);

    //    if (!$student) {
    //     echo "Người dùng không tồn tại";
    //     exit();
    //    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];  // Lấy thông tin từ biểu mẫu
        $email = $_POST['email']; // lấy giá trị email từ form
        $status = $_POST['status']; // lấy giá trị trạng thái từ form

        $sql = "UPDATE user SET name = :name, email = :email, status = :status, img =:img 
        WHERE id = :id"; 
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
<form method = "post" enctype= "multipart/form-data">
    <label>Tên: <input type="text" name="name" value = "<?php echo $student['name'] ?>"></label> <br>
    <label>Email <input type="email" name="email" value = "<?php echo $student['email'] ?>"></label> <br>
    <label> Ảnh đại diện <input type="file" name="fileToUpload"></label> <br>
    <label >Trạng thái <input type="status" value = "<?php echo $student['status'] ?>"> </label> <br>
        <select name="status">
            <option value="0">Hoạt động</option>
            <option value="1">dừng hoạt động</option>
        </select> <br>
    <input type="submit" value="lưu">
</form>
</body>
</html>