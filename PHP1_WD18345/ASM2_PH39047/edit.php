<?php
  include("connection.php");

  // Kiểm tra ID của người dùng truyền qua URL
  if(isset($_GET['id'])){
      $id = $_GET['id'];
    }
      $sql = "SELECT * FROM student WHERE id = :id";

      //   $sql = "SELECT * FROM students where id = ':id'";
        //Thực hiện chuẩn bi câu lệnh truy vấn CSDL
    // $sql = "SELECT * FROM students";

        $stmt = $conn->prepare($sql);
        //Thực hiện truy vấn
        // $stmt->execute(['id' => $id]);
        $stmt->execute(['id' => $id]);

        //Lấy tất cả các kết quả lưu vào CSDL
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!$user){
            echo "Người dùng không tồn tại";
            exit();
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          $name=$_POST["name"];
          $age = $_POST["age"]; 
          $description = $_POST["description"];
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
            $img = $user['img'];
        }

        // Thực hiện chuẩn bị truy vấn CSDL
        $sql = "UPDATE student SET name = :name, age = :age, description = :description, avatar = :img WHERE id =:id";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute([':name' => $name, ':age' => $age, ':description' => $description, ':img' => $img, ':id' => $id])){
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="container">
        <h2>SỬA THÔNG TIN</h2>
        <form method="post" enctype="multipart/form-data">
            <div>
                <label>Tên sinh viên</label>
                <input type="text" name="name" value="<?php echo  $user['name'] ?>">
            </div>
            <div>
                <label>Tuổi</label>
                <input type="text" name="age" value="<?php echo  $user['age'] ?>">
            </div>
            <div>
                <label>Ảnh đại diện <img src="<?php echo $user['avatar'];?>" width="100px"></label>
                <input type="file" name="fileToUpload">
            </div>
            <div>
                <label>Mô tả sinh viên</label>
                <input type="text" name="description" value="<?php echo  $user['description'] ?>">
            </div>
            <button name="sua" value="sua"> Sửa</button>
            <button type="reset" value="reset">Reset</button>
        </form>
    </div>
    <a href="index.php">Về trang danh sách</a>
</body>

</html>