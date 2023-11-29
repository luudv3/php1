<?php
// $array = [0,2,5,8,9];

// print_r ($array); // in ra cả mảng
// echo $array[2];

// echo "<br>";

// // 8 và 9
// // Cộng 2 giá trị này
// $gia_tri_8 = $array[3];
// $gia_tri_9 = $array[4];
// $tong = $gia_tri_8 + $gia_tri_9;

// echo "Kết quả là: " .$tong;
// echo "<br>";
// //$arr = array(1,2,3,4); //Cách khai báo cũ php 5.4 trở xuống
// $arr2 = [3,5,7,9];    // sử dụng cách khai báo này
// //Thêm 1 phẩn tử trong mảng
// $arr2[4] = 12;
// echo $arr2[4];

// Khai báo 1 mảng có 10 giá trị
// Thêm 2 phần tử vào mảng
// kiểm tra các giá trị chẵn
// Kiểm tra các giá trị lẻ

$array = [1,2,3,4,5,6,7,8,9,10];
$array[] =11;
$array []= 12;
print_r($array);
// print_r($array);
//Thêm 2 phần tử vào mảng
// $array[11] = 12 ;
// $array[12] = 13;
// // print_r($array);

// $soChan = [];
// $soLe = [];
// //Kiểm tra các giá trị chẵn và lẻ ở trong mảng
// for ($i = 0; $i < count($array); $i++){
//  $value = $array[$i];
//  if ($value %2 == 0){
//     $soChan[] = $value;
//  }
//  else {
//     $soLe [] = $value;
//  }
// }
// echo "Các giá trị chẵn trong mảng là:";
// for($i = 0; $i < count($soChan); $i++){
//    echo $soChan[$i]. " ";
// }
// echo "<br>";
// echo "Các giá trị lẻ trong mảng là:";
// for($i = 0; $i < count($soLe); $i++){
//    echo $soLe[$i]. " ";
// }
// Cấu trúc foreach:
    // //foreach ($key as $value){
        //thực hiện cv
    // }

    //$array : Mảng liên hợp
    // $key: nó giá trị ban đầu
    // $value: giá trị sau khi gán

//Mảng liên hợp
// $fruit = ["Dưa", "Lê", "Mận", "Đào"];
// // print_r($fruit);
// foreach ($fruit as $fruits){
//     echo $fruits . " ";
// }
//Tính tổng các phần tử trong mảng
$array = [1,2,3,4,5,6,7,8,9,10,11];
$sum = 0;
foreach($array as $key){
    $sum += $key;
}
echo $sum;


//Hiển thị danh sách sinh viên
// hiển thị ra tên và tuổi

echo "<br>";
$Student = [
    "Name" => "luu",
    "age" => 18
];

echo "Tên sinh Viên : " . $Student["Name"] . "<br>";
echo "Tuổi sinh viên: " . $Student["age"] . "<br>";

/*Bài tập:
Bài 1: Tạo 1 mảng liên hợp chưa thông tin quốc gia(Tên quốc gia, thủ đô, dân số, diện tích)
in ra thông tin của tất cả các quốc gia trong mảng
//Bài 2: Tạo 1 mảng liên hợp chưa các thông tin (Tên môn học, giảng viên, số tín chỉ). 
in ra
thông tin các môn học có số tin chỉ lớn hơn 3
//Bài 3: tạo 1 mảng liên hợp chưa các thông tin các sản phẩm (Tên sản phẩm, giá bán, 
số lương). Tính tổng số lượng trong kho của tất cả sản phẩm
*/

?>