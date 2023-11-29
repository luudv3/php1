<?php
    require_once "connection.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $overview = $_POST['overview'];
        $release_date = $_POST['release_date'];
        $genre_id = $_POST['genre_id'];

        // Lấy dữ liệu files:
        $file = $_FILES['poster'];
        $poster = $file['name'];
        // Upload file
        move_uploaded_file($file['tmp_name'], "img/" . $poster);

        // SQL INSERT
        $sql = "INSERT INTO movies(title, poster, overview, release_date, genre_id) VALUES('title', 'poster', 'overview', 'release_date', 'genre_id')";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        setcookie("message", "Thêm dữ liệu thành công", time()+1);
        header("Location: index.php");
        die;
    }
    // câu lệnh SQL lấy dữ liệu bảng genres
$sql = "SELECT * FROM genres";
$stmt = $conn->prepare($sql);
$stmt->execute();
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phim</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        Tiêu đề: <input type="text" name="title" id="">
        <br>
        Áp phích: <input type="file" name="poster" id="">
        <br>
        Tổng quản: 
        <textarea name="overview" id="" cols="100" rows="10"></textarea>
        <br>
        Ngày phát hành: <input type="data" name="release_date" id="">
        <br>
        Thể loại:
        <select name="genre_id" id="">
            <?php foreach($genres as $gen): ?>
                <option value="<?php echo $gen['genre_id'] ?>">
                    <?= $gen['genre_name'] ?>
                </option>
            <?php end foreach ?>
        </select>
        <br>
        <button type="submit">Thêm</button>
        <a href="index.php">Danh sách</a>
    </form>
</body>
</html>