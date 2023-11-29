<?php
$array = array(1,3,5,7); //Cách khai báo cũ phiên bản 5.4
$array2 = [2,3,5,7,9,14,16,18];
print_r($array2); // in tất cả các phần tử trong mảng
echo $array2[4];
echo "<br>";

// Lấy các số 14 và 18
// Tính tổng của 2 số vừa lấy ra
$gia_tri_thu_5 = $array2[5];
$gia_tri_thu_7 = $array2[7];
$tong = $gia_tri_thu_5 + $gia_tri_thu_7;
echo "Kết quả là: " .$tong;
echo "<br>";
// Thay thế 1 giá trị trong mảng
$array2[5] = 50;
echo $array2[5];

// Khai báo 1 mảng gồm 12 giá trị
// thay thế 2 phần tử trong mảng
// kiểm tra các phần tử là số chắn
// kiểm tra các phần tử là số lẻ
// tìm giá trị lớn nhát trong mảng

$mang = [1,2,3,4,5,6,7,8,9,10,11];


?>