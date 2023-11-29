<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $productName = $_POST['product-name'];
        $quaitity = $_POST['quaitity'];
    ?>
    <div>Thông tin</div>
    <div>
        <p>Tên sản phẩm: <?php echo $productName ?></p>
        <p>Số Lượng: <?php echo $quaitity ?></p>
    </div>
</body>
</html>