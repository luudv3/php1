<?php
/*
    Function: Gọi là Hàm nó dùng dùng để đóng 1 chức trong trong 
    chương trình
    Cấu trúc của Function:

    Function tenHam(){
        Khối lệnh;
        return value;
    }

    Hàm không có return thì nó sẽ không cần lấy giá trị mà
    sẽ hiển thị ra chương trình
    Hàm có return nó sẽ lấy giá trị thực hiện câu lệnh cho
    chương trình
    Các loại hàm:
    +) Hàm không có tham số và không có giá trị trả về
    +) Hàm không có tham số và có giá trị trả về
    +) hàm có tham số và không có giá trị trả về
    +) hàm có tham số và có giá trị trả về
*/
//Hàm không có tham số và không có giá trị trả về
// function hello(){
//     echo "hi chào cậu";
// }
// hello();

//Tạo 1 function để tính tổng của 2 biến

// Function tinhTong(){
//     $a = 5;
//     $b = 10;
//     $tong = $a + $b;
//     echo $tong;
// }
// tinhTong();

// Hàm không có tham số và có giá trị trả về
//Tạo 1 function để tính tổng của 2 biến
    // Function tinhTong(){
    //     $a = 5;
    //     $b = 10;
    //     $tong = $a + $b;
    //     echo $tong;
    //     return $tong;
    // }
    // tinhTong();

    //hàm có tham số và không có giá trị trả về
    // Function sum($a, $b){ // Các giá trị trong () được gọi là THAM SỐ
    //     $tong = $a + $b;
    //     echo $tong;
    // }
    // sum(9,10);

    //hàm có tham số và có giá trị trả về

    // Function sum($a, $b){ // Các giá trị trong () được gọi là THAM SỐ
    //     $tong = $a + $b;
    //     echo $tong;
    //     return $tong;
    // }
    // sum(10,10);

    // Bài tập lab 3:
    // Bài 1: Sử dụng hàm không trả về có tham số. Giải phương trình bậc 1
    // Bài 2: Sử dụng hàm trả về có tham số. Tính diện tích hình thang
    // Bài 3: Kiểm tra số truyền vào có phải là số nguyên tố hay không 
    // (2 cách: hàm trả về và hàm không trả về)

// function chen_vao_giua_mang($mang, $phan_tu_chen) {
//     $vi_tri_giua = ceil(count($mang) / 2);
//     array_splice($mang, $vi_tri_giua, 0, $phan_tu_chen);
//     return $mang;
// }

// Sử dụng ví dụ:
// $mang = array(1, 2, 3, 4, 5);
// $phan_tu_chen = 10;
// $mang = chen_vao_giua_mang($mang, $phan_tu_chen);
// print_r($mang);

// echo "<br>";

// $lon_nhat = max($mang);
// echo "$lon_nhat";

    
?>