<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
    include("connection.php");
    $sql = "SELECT * FROM student";
    //Thực hiện chuẩn bi câu lệnh truy vấn CSDL
    $stmt = $conn->prepare($sql);
    //Thực hiện truy vấn
    $stmt->execute();
    //Lấy tất cả các kết quả lưu vào CSDL
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <h2>DANH SÁCH SINH VIÊN</h2>
    <div class="container">

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Avatar</th>
                    <th>Descripstion</th>
                    <th>Created at</th>
                    <th><a href="create.php ">Thêm</a></th>
                </tr>
            </thead>
            <tbody>
                <?php 
            foreach ($students as $student):
               $id = $student['id'];
               $name = $student['name'];
                $age = $student['age'];
                $img = $student['avatar'];
                $description = $student['description'];
                $created_at = $student['created_at'];
            
            ?>
                <tr>
                    <td><?php echo $id ?> </td>
                    <td><?php echo $name ?> </td>
                    <td><?php echo $age ?> </td>
                    <td style="position: relative;" class="img-td">
                        <img src="<?php echo $img ?>" alt="Anhr đại điện" width="100%" height="170px" object-fit="cover"
                            position=" absolute">
                    </td>
                    <td><?php echo $description ?> </td>
                    <td><?php echo $created_at ?> </td>
                    <td>
                        <button><a href=" edit.php?id=<?php echo $id ?>">Sửa </a></button>
                        <form method="post" action="delete.php" style="display: inline-block;">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <button type="submit"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>