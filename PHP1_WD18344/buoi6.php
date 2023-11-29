<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET POST</title>
</head>
<body>
    <?php
    /*
            Xử lý form
            Dữ liệu truyền lên server thông qua 2 phương thức
            - GET
            - POST
            Phương thức GET: Dữ liệu được gửi lên server thông qua phương thức GET bằng cách bổ sung các 
            tham số đằng sau URL sau đó phân tích và trả lại kết quả
            Đối với dữ liệu cần bảo mật thì không nên sử dụng get vì nó hiển thị dữ liệu lên URL
            thông thường những hành động nào làm thay đổi database cũng không nên sử dụng GET
            2. Lấy dữ liệu
            - Để lấy dữ liệu ta dùng biến $_GET 
            - $_GET là biến toàn cục lưu trữ tất ca dữ liệu từ client gửi lên server
            - $_GET là 1 mảng định danh
            - lưu ý: trước khi lấy dữ liệu thì phải kiểm tra xem nó có tồn tại hay không?
            - để kiểm tra dữ liệu thì dùng hàm isset(dữ liệu càn kiểm tra)
            3. Phương thức post 
            - Là hình thức gửi dữ liệu từ client lên serve giống phương thức get 
            - dữ liệu gửi bằng phương thức post được ẩn đi 
        */
        echo'<pre>';
        // var_dump($_GET);
        // if(isset($_GET['product-name']));{
        //     echo $_GET['product-name'];
        // }
        // echo "<br>";
        // if(isset($_GET['quantity']));{
        //     echo $_GET['quantity'];
        // }
        // echo $_GET['product-name'];
        // echo "<br>";
        // echo $_GET['quantity'];
        var_dump($_POST);
        /*
            Tổng kết:
            - Giống nhau: đều là phương thức truyền dữ liệu từ phía client
            - khác nhau:
                - dữ liệu sử dụng phương thức post để gửi đi bảo mật hơn phương thức GET
                - GET luôn nhanh hơn post 
                - nếu dữ liệu càn bảo mật thì nên sử dụng post
                - khi sử dụng các câu lệnh trong database
                    - nếu là select thì có thể sử dụng GET 
                    - Nếu là các câu lệnh tác động và thay đổi dữ liệu trong database thì sử dụng post
        */
    ?>
    <form action="infor.php" method="POST">
        <input type="text" name="product-name" id="product-name" placeholder="Product Name">
        <input type="text" name="quaitity" id="quaitity" placeholder="quaitity">
        <input type="submit" name="submit" id="btn-submit" value="Thêm">
    </form>
    
    <!--Bài tập 
        Tạo một form đăng ký với các trường sau:
        Họ và tên: full_name
        Tuổi: age
        Lớp: class
        Địa chỉ: address
        Sử dụng phương thức POST để gửi dữ liệu đăng ký.
        Tạo một trang xử lý student.php để nhận và hiển thị thông tin đã đăng ký. -->


</body>
</html>