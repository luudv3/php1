<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=wd18345", $username, $password);
// thiết lập lỗi PDO thành ngoại lệ
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    //Thực hiện truy vấn SQL để lấy dữ liệu
    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Hiển thị thông tin
    echo "<h2>Danh sách sinh viên </h2>";
    echo "<ul>";
    foreach ($users as $user){
        echo "<li>{$user['name']} - {$user['email']} - {$user['status']} </li>";
    }

    echo "Connected successfully";
}
catch(PDOException $e)
{
   echo "Connection failed: " . $e->getMessage();
}

?>
