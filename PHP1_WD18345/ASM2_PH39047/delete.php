<?php
include("connection.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//Lấy ID của sinh viên cần xóa từ form
$id = $_POST['id'];
// chuẩn bị câu truy vấn SQL
$sql = "DELETE FROM students WHERE id = :id";

// thực hiện truy vấn SQL và truyền giá trị cho tham số ID
$stmt = $conn->prepare($sql);
if($stmt->execute(array(':id' => $id))){
    //Xóa thành công, chuyển hướng về trang chủ
    header("Location: index.php");
    exit();
} else {
    // xử lý lỗi nếu việc chèn thông tin thất bại
    //sẽ hiển thị lỗi
    echo "error: " . $stmt->errorInfo()[2];
}
}
?>