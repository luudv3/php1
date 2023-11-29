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
    $nameErr = $ageErr ="";
    if($_SERVER["REQUEST_METHOD"]=== "POST"){
        $name = $_POST["name"];
        $age = $_POST["age"];
        $mota = $_POST["mota"];
        $img = $_FILES["fileToupLoad"];
        $imgErr = "";
        
        $imgtypeFile = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));

        //validateTên

        if(empty($name)){
            $nameErr = "Họ tên không được để trống";
        }
        //validate tuổi
        if(empty($age)){
            $ageErr = "Tuổi tên không được để trống";
        }
        //validate ẢNH
        if($imgtypeFile != "jpg" && $imgtypeFile != "png" && $imgtypeFile != "jpeg"){
            $imgErr = "Chỉ nhận file JPG, PNG, JPEG";
            
        }
        
    if(empty($nameErr) && empty($ageErr)){
        if(isset($_FILES["fileToupLoad"])){           
            if(move_uploaded_file($img['tmp_name'],'img/'.$img['name'])){
                echo"Tệp " . htmlspecialchars($img['name']) . " đã được tải lên";
            }else{
                echo"Đã có lỗi khi tải lên";
                
            }
        }
    }
        $sql = "INSERT INTO student (name, age, mota, img)VALUE (:name, :age, :mota, :img)";
        $stmt = $conn -> prepare($sql);

        if($stmt -> execute([":name" => $name, ":age" => $age, ":mota" => $mota, ":img" => $img['name']])){
            if(empty($nameErr) && empty($ageErr) && empty($imgErr)){
                header("location: index.php");
                exit();
            }           
        }else{
            echo "Error" . $stmt -> ErrorInfo()[2];
        }
        
    }
    ?>

    
    <h1>THÊM SINH VIÊN</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
        <a href="index.php">Về trang danh sách</a><br><br>
        <label for="">Họ tên: <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>"> </label>
        <span><?php echo $nameErr ?></span><br>
        <label for="">Tuổi: <input type="text" name="age" value="<?php echo isset($age) ? $age : ''; ?>"> </label>
        <span><?php echo $ageErr ?></span><br>
        <label for="">Ảnh đại diện: <img src="<?php echo $student['img'] ?>" alt="" width="100px"></label>
        <span><?php echo $imgErr??'' ?></span><br>
        <input type="file" name="fileToupLoad"><br><br>
        <label for="">Mô tả sinh viên: <input type="text" name="mota"></label><br><br>
        <input type="submit" name="save" value="Save">
        <input type="reset" name="reset" value="Reset">
    </form>
</body>
</html>