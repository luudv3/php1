<?php
// Kiểm tra nếu có tệp ảnh tải lên, di chuyển
// vào img
//$_file: khi cần làm việc với file
if(isset($_FILES["fileToUpload"])){
    // đưa hình ảnh thư mục img
    $targret_dir = "img/";
    // lấy tên file ảnh
    $img = $_FILES["fileToUpload"] ["name"];
    //Tạo đường dẫn 
    $target_img = $targret_dir . $img;
    //move_uploaded_file: hàm hỗ trợ khi làm việc với file
    //htmlspecialchars: hỗ trợ để chuyển đổi các ký tự đặc biệt
    if(move_uploaded_file($_FILES["fileToUpload"] 
    ["tmp_name"], $target_img)) {
        echo "Tệp " . htmlspecialchars($img) . 
        " đã được tải lên";
    }
    else {
        echo "đã có lỗi khi tải lên";
    }
}
?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method = "post" enctype= "multipart/form-data" >
    <h2>Tải lên tệp</h2>
    chọn tệp để tải lên:
    <input type="file" name="fileToUpload">
    <input type="submit" name="submit" value ="tải file">
</form>