<?php
// Kiểm tra nếu có tệp ảnh tải lên, di 
//chuyển nó vào  thư mục img 
//$_files: là 1 biến toàn cục
// dùng để làm việc với file
if(isset($_FILES['fileToUpload'])){
    // Thư mục để lưu file ảnh
    $target_dir = "img/";
    // lấy tên của tệp ảnh từ lấy từ form
    $img = $_FILES["fileToUpload"] ["name"];
    //Tạo đường dẫn đầy đủ từ tệp ảnh
    $target_img = $target_dir . $img;
    //hàm move_uploaded_file: dùng để lấy file ảnh
    // di chuyển đươc file ảnh
    if(move_uploaded_file($_FILES["fileToUpload"] 
    ["tmp_name"], $target_img )){
        //htmlspecialchars: chuyển đổi các ký tự đặc biệt
        // sang dạng html
        echo "Tệp" . htmlspecialchars($img) . " đã được tải lên thành công";
    }
    else{
        echo "Đã xảy ra lỗi khi tải tệp lên";
    }
}
?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method = "POST"
 enctype="multipart/form-data">
    <h2>Tải tệp lên</h2>
    Chọn tệp để tải lên:
<input type="file" name="fileToUpload">
<input type="submit" name="submit" value ="tải file" >
</form>