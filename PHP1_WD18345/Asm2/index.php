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
     //truy vấn toàn bộ dữ liệu từ bảng user
     $sql = "SELECT * FROM student";
     //Chuẩn bị thực thi câu lệnh sql
     $stmt = $conn -> prepare($sql);
     //Thực hiện truy vấn
     $stmt -> execute();
 
     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h2>DANH SÁCH SINH VIÊN</h2>
    <table border="1">
        <a href="them.php"><button type="button">Thêm sinh viên</button></a>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Avatar</th>
            <th>Mô tả</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php foreach($users as $user):
                $id = $user["id"];
                $name = $user["name"];
                $age = $user["age"];
                $img = $user["img"];
                $mota = $user["mota"];
                $ngaytao = $user["ngaytao"];
            ?>
            <tr>
                <th><?php echo $id ?></th>
                <th><?php echo $name ?></th>
                <th><?php echo $age ?></th>
                <th> <img src="img/<?php echo $img ?>" alt="Ảnh đại diện" width="100px"></th>
                <th><?php echo $mota ?></th>
                <th><?php echo $ngaytao ?></th>
                <th>
                    
                    <a href="sua.php?id=<?php echo $id ?>"><button type="button">Sửa</button></a>
                    <form action="xoa.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">Xóa</button>
                    </form>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>