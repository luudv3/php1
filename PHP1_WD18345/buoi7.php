<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET POST</title>
</head>
<body>
    <?php

user_departure_datetime
        /*
        Phương thức GET và POST:
        - Phương thức GET: gửi dữ liệu lên server thông qua đường dẫn URL và có tham số
        đăng sau URL

        2. Lấy dữ liệu
        - $_GET:Tham số truyền vào
        - Phương thức $_GET: Dữ liệu được gửi lển server thông qua đường dẫn URL
        - Phương thức GET không được bảo mật do hiển thị thông tin
        trên URL
        isset
        Phương thức POST

        Tạo 1 file php nhập thông tin sinh viên (Họ tên, Giới tính, tuổi, quê)
        sử sụng phương thức POST để hiển thị thông tin

           Tạo 1 file HTML với 1 form đăng nhâp gồm email và password
        sử dụng phương thức POST để gửi dữ liệu đến 1 trang PHP
        trong trang php kiểm tra tên người dùng và mật khẩu đã được nhập
        nếu nhập đúng, hiển thị thông báo "Đăng nhập thành công". ngược lại hiển thị
        thông báo "Đăng nhập thất bại"
        */
        var_dump($_POST);
        if(isset($_POST['product-name'])){
            echo $_POST['product-name'];
        }
        //echo $_GET['quantity'];
        if(isset($_POST['quantity'])){
            echo $_POST['quantity'];
        }
        echo "<br>";
        // echo $_GET['quantity']; 
    ?>
    <!--Bài tập 
        Tạo một form đăng ký với các trường sau:
        Họ và tên: full_name
        Tuổi: age
        Lớp: class
        Địa chỉ: address
        Sử dụng phương thức POST để gửi dữ liệu đăng ký.
        Tạo một trang xử lý process_registration.php để nhận và hiển thị thông tin đã đăng ký. -->
    
    <form action="infor.php" method="POST">
        <input type="text" name="product-name" id="product-name" placeholder="Product Name">
        <input type="text" name="quantity" id="quantity" placeholder="quantity">
        <input type="submit" name="submit" id="btn-submit" value="Thêm">
    </form>
    
</body>
</html>