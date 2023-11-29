<?php
        include("connection.php");
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name=$_POST["name"];
            $age = $_POST["age"];
            $description = $_POST["description"];
            $checktrong = "";
            
            if(isset($_FILES["fileToUpload"])){
                // đưa hình ảnh thư mục img
                $targret_dir = "img/";
                // lấy tên file ảnh
                $img = $_FILES["fileToUpload"] ["name"];
                //Tạo đường dẫn 
                $target_img = $targret_dir . $img;
                if(move_uploaded_file($_FILES["fileToUpload"] ["tmp_name"], $target_img)) {
                    // echo "Tệp " . htmlspecialchars($img) . " đã được tải lên";
                    // lấy đường dẫn lưu vào CSDL
                    $img = $target_img;
                }
                
            }
        if($name == "" || $age == ""){
           
            echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>";
        }else{
            $sql = "INSERT INTO students(name, age, avatar, description) VALUES (:name,:age, :img,:description)";
            $stmt = $conn->prepare($sql);
                // header("Location: index.php");

           
            if ( $stmt->execute()([':name' => $name, ':age' => $age, ':img' => $img, ':description' => $description])){
                //Nếu thành công, chuyển hướng tới trang index
                header("Location: index.php");
                exit();
            }
            // else {
            //     // xử lý lỗi nếu việc chèn thông tin thất bại
            //     //sẽ hiển thị lỗi
            //     echo "error: " . $stmt->errorInfo()[2];
            // }
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
        <h2>THÊM SINH VIÊN MỚI</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <div>
                <label>Tên sinh viên</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Tuổi</label>
                <input type="text" name="age">
            </div>
            <div>
                <label>Anhr đại diện</label>
                <input type="file" name="fileToUpload">
            </div>
            <div>
                <label>Mô tả sinh viên</label>
                <input type="text" name="description">
            </div>
            <button name="btnsubmit"> Save</button>
            <button type="reset" value="reset">Reset</button>

        </form>
    </div>
    <a href="index.php">Về trang danh sách</a>

</body>

</html>