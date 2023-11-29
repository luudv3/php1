<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Thông tin sinh viên</h2>
    <?php
    include("connection.php");
    //Thực hiện truy vấn SQL để lấy dữ liệu
    $sql = "SELECT * FROM user";
    //Thực hiện chuẩn bị truy vấn CSDL
    $stmt = $conn->prepare($sql);
    //Lấy tất cả các kết quả lưu vào CSDL
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <a href="add.php"><button type="button">Thêm</button></a>
    <table border ="1">
        <thead>
            <th>ID</th>
            <th>Ảnh đại diện</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </thead>
        <tbody>
            <?php foreach($users as $user):
            $id = $user["id"];
            $img = $user["img"];
            $name = $user["name"];
            $email = $user["email"];
            $status = $user["status"];
            ?>
            <tr>
                <td><?php echo $id ?></td>
                <td>
                    <img src="<?php echo $img ?>" alt="ảnh đại diện" width="100px">
                </td>
                <td><?php echo $name ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $status ?></td>  
                <td>
                    <a href="update.php?id=<?php echo $id ?>"><button>Sửa</button></a>
                    
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>