<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit" name="login">Login</button>
    </form>
</body>
<?php 
if(isset($_POST['login'])) { // Kiểm tra xem người dùng đã nhấn nút đăng nhập hay chưa
    $username = $_POST['username']; // Lấy giá trị tên đăng nhập từ form
    $password = $_POST['password']; // Lấy giá trị mật khẩu từ form
    
    // Kiểm tra tên đăng nhập và mật khẩu có khớp với admin:321 không
    if($username === 'admin' && $password === '123') { 
        $_SESSION['username'] = $username; // Lưu tên đăng nhập vào session
        $_SESSION['password'] = $password; // Lưu mật khẩu vào session
        header('location:index.php'); // Chuyển hướng đến trang index.php sau khi đăng nhập thành công
    } else {
        echo "incorrect password"; // Thông báo lỗi nếu tên đăng nhập hoặc mật khẩu không đúng
    }
}
?>

</html>