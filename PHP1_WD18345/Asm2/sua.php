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
    //Kiểm tả id có tồn tại hay ko
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    //Lấy thông tin cần chỉnh sửa
    $sql = "SELECT * FROM students WHERE id = :id";
    //truy vấn toàn bộ dữ liệu từ bảng user
    //$sql = "SELECT * FROM students";
    //Chuẩn bị thực thi câu lệnh sql
    $stmt = $conn -> prepare($sql);
    //Thực hiện truy vấn
    $stmt -> execute([':id' => $id]);

    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$student){
        echo "Người dùng không tồn tại";
        exit();
    }

    if($_SERVER["REQUEST_METHOD"]=== "POST"){
        $name = $_POST["name"];
        $age = $_POST["age"];
        $mota = $_POST["mota"];
        

        //validateTên
        if(empty($name)){
            $nameErr = "Họ tên không được để trống";
        }
        //validate tuổi
        if(empty($age)){
            $ageErr = "Tuổi tên không được để trống";
        }
        if(empty($nameErr) && ($ageErr)){

            if(isset($_FILES["fileToupLoad"])){
                //đưa hình ảnh vào thư mục img
                $targer_dir = "img/";
                //lấy tên file ảnh
                $img = $_FILES["fileToupLoad"]["name"]; 
        
                //tạo đường dẫn
                $target_img = $targer_dir . $img;
        
                //move_upload_file : hàm hỗ trợ khi làm việc với file
                //htmlspecialchars : hỗ trợ chuyển đổi các ký tự đặc biệt
                

                if(move_uploaded_file($_FILES["fileToupLoad"] ["tmp_name"], $target_img)){
                    echo"Tệp " . htmlspecialchars($img) . " đã được tải lên";
                }else{
                    echo"Đã có lỗi khi tải lên";
                }
            }
        }
        $sql = "UPDATE students SET name = :name, age = :age, mota = :mota, img = :img WHERE id = :id";
        $stmt = $conn -> prepare($sql);

        if($stmt -> execute([":name" => $name, ":age" => $age, ":mota" => $mota, ":img" => $img, ":id" => $id])){
            header("location: index.php");
            exit();
        }else{
            echo "Error" . $stmt -> ErrorInfo()[2];
        }
        
    }
    ?>

    
    <h1>SỬA SINH VIÊN</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
        <a href="index.php">Về trang danh sách</a><br><br>
        <label for="">Họ tên: <input type="text" name="name" value="<?php echo $student['name'] ?>"> </label><br><br>
        <label for="">Tuổi: <input type="text" name="age" value="<?php echo $student['age'] ?>"> </label><br><br>
        <label for="">Ảnh đại diện: <img src="<?php echo $student['img'] ?>" alt="" width="100px"> </label>
        <input type="file" name="fileToupLoad"> <br><br>
        <label for="">Mô tả sinh viên: <input type="text" name="mota" value="<?php echo $student['age'] ?>"></label><br><br>
        <input type="submit" name="save" value="Lưu">
    </form>
</body>
</html>