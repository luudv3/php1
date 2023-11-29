<?php
// Tạo mảng chứa thông tin của các sản phẩm
$products = array(
    array("name" => "Sản phẩm A", "price" => 10.99, "quantity" => 5),
    array("name" => "Sản phẩm B", "price" => 5.49, "quantity" => 8),
    array("name" => "Sản phẩm C", "price" => 7.29, "quantity" => 3),
    array("name" => "Sản phẩm D", "price" => 15.99, "quantity" => 2),
    array("name" => "Sản phẩm E", "price" => 12.49, "quantity" => 6)
);

// Hàm để sắp xếp mảng theo giá từ cao đến thấp
function sortByPriceDescending($a, $b) {
    return $b["price"] - $a["price"];
}

// Sắp xếp mảng theo giá từ cao đến thấp
usort($products, "sortByPriceDescending");

// Hiển thị danh sách sản phẩm đã được sắp xếp
echo "Danh sách sản phẩm đã được sắp xếp theo giá từ cao đến thấp:<br>";
foreach ($products as $product) {
    echo "Tên sản phẩm: " . $product["name"] . ", Giá: $" . $product["price"] . ", Số lượng: " . $product["quantity"] . "<br>";
}
?>
