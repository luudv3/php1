<?php
// Vòng Lặp For
// Cấu trúc :
// For (Giá trị khởi tạo;Điều kiện; Bước nhảy){
// Thực hiện vòng lặp
//}

// sử dụng vòng lặp for in ra các số từ 1-5

// for ($i = 1; $i <= 5; $i++){
//     echo $i;
// }

// sử dụng vòng lặp for in ra các số chẵn

// Sử dụng vòng lặp for để tính tổng liên tục 
// $n = 0;
// for ($i = 1; $i <= 10; $i++){
//     $n += $i;
// }
// echo "Tổng các số từ 1 đến 10 là :" . $n

// Sử dụng vòng lặp for để vẽ hình tam giác
$hight = 5;
for ($i = 1; $i <= $hight; $i++){
    //echo "*";
    for ($j = 1; $j <= $i; $j++){
        echo "*";
    }
    echo "<br>";
}
// Sử dụng vòng lặp for để vẽ hình chữ nhật
// Sử dụng vòng lặp for để in ra bảng cửu chương
?>