<?php

// Khai báo 1 mảng gồm 12 giá trị
// thêm 2 phần tử trong mảng
// kiểm tra các phần tử là số chắn
// kiểm tra các phần tử là số lẻ
// tìm giá trị lớn nhát trong mảng

// $mang = [1,2,3,4,5,6,7,8,9,10,11];
// Thêm 2 phần tử vào mảng
$mang[] = 12;
$mang[] = 13;
// print_r($mang);
$soChan = [];
$soLe = [];
// Kiểm tra các phần tử chẵn và lẻ ở trong mảng
for($i = 0; $i < count($mang); $i++){
    $value = $mang[$i];
    if($value %2 == 0){
        $soChan[] = $value;
    }
    else{
        $soLe[] = $value;
    }
}
// in kết quả
echo "Giá trị chẵn có trong mảng là: ";
for($i = 0; $i < count($soChan); $i++){
    echo $soChan[$i] . " ";
}

echo "Giá trị chẵn có trong mảng là: ";
for($i = 0; $i < count($soLe); $i++){
    echo $soLe[$i] . " ";
}

/*
foreach ($array as $key => $value){
    // Các dòng lệnh
}
 $array : là những mảng liên hợp mà chúng ta muốn duyệt
 $key: là biến để lưu trữ khóa của phần từ hiện trong vòng lặp
 $value: Biến để lưu trữ giá trị của phần tử hiện tại
*/
echo "<br>";
$fruit = ["Táo", "Lê", "Mận", "Dừa"];
foreach($fruit as $fruits){
    echo $fruits . "<br>";
}

// Thêm 1 phần tử vào 1 vị trí bất kỳ ở trong mảng
//Khai báo mảng 
//Giá trị cần thêm
$mang = [1,2,3,4,5,6,7,8,9,10,11];
$valueAdd = 52;
//Vị trí mà mình muốn thêm vào mảng
$valueIndex = 4;

array_splice($mang, $valueIndex, 0, $valueAdd);
foreach($mang as $value){
    echo $value . " ";
}
echo "<br>";

//Sử dụng foreach để tính tổng giá trị của mảng
$sum = 0;
foreach ($mang as $value){
    $sum += $value;
}
echo "Tổng giá trị của mảng là: " . $sum;

//Mảng liên hợp
// in ra tên của những bạn nộp phạt
echo "<br>";

$student = [
    "name" => "Khánh",
    "age"  => 19,
    "SoLan" => 50
];
  echo "Tên sinh Viên: " .$student["name"] . "<br>";
  echo "Tuổi sinh viên: " .$student["age"] . "<br>";
  echo "số Lần: " . $student["SoLan"] . "<br>";

/*Bài 1:  Tạo 1 mảng liên hợp chứa các thông tin các quốc gia
(Tên quốc gia, Thủ đô, dân số, diện tích) . In ra thông tin
tất các quốc gia
Bài 2: Tạo 1 mảng liên hợp chứa thông tin môn học
(Tên môn học, Tên Giảng Viên, Số tín chỉ). In ra thông tin của 
các môn học có số tín chỉ lớn hơn 3
Bài 3: Tạo 1 mảng liên hợp chưa thông tin các sản phẩm (Tên SP
Giá bán, số lượng). Tính tổng số lượng các sản phẩm 
  */
  $countries = [
    [
        "Tên quốc gia" => "Việt Nam",
        "Thủ đô" => "Hà Nội",
        "Dân số" => 96462106,
        "Diện tích" => 331212
    ],
    [
        "Tên quốc gia" => "Mỹ",
        "Thủ đô" => "Hàn Quốc",
        "Dân số" => 331002651,
        "Diện tích" => 9629091
    ],
    [
        "Tên quốc gia" => "Trung Quốc",
        "Thủ đô" => "Bắc Kinh",
        "Dân số" => 1439323776,
        "Diện tích" => 9640011
    ]
    ];

foreach ($countries as $country) {
    echo "Tên quốc gia: " . $country["Tên quốc gia"] . "<br>";
    echo "Thủ đô: " . $country["Thủ đô"] . "<br>";
    echo "Dân số: " . $country["Dân số"] . "<br>";
    echo "Diện tích: " . $country["Diện tích"] . "<br><br>";
}
$subjects = [
    [
        "Tên môn học" => "Toán",
        "Tên Giảng Viên" => "Đặng Vũ Lưu",
        "Số tín chỉ" =>4 
    ],
    [
        "Tên môn học" => "Văn",
        "Tên Giảng Viên" => "Nguyễn Phương Thuận",
        "Số tín chỉ" => 3
    ],
    [
        "Tên môn học" => "Lý",
        "Tên Giảng Viên" => "Trần Văn Lợi",
        "Số tín chỉ" => 5
    ]
    ];

foreach ($subjects as $subject) {
    if ($subject["Số tín chỉ"] > 3) {
        echo "Tên môn học: " . $subject["Tên môn học"] . "<br>";
        echo "Tên Giảng Viên: " . $subject["Tên Giảng Viên"] . "<br>";
        echo "Số tín chỉ: " . $subject["Số tín chỉ"] . "<br><br>";
    }
}

// Tạo một mảng liên hợp chứa thông tin sản phẩm
$products = [
    ["Tên SP" => "Sản phẩm 1", "Giá bán" => 10, "Số lượng" => 5],
    ["Tên SP" => "Sản phẩm 2", "Giá bán" => 15, "Số lượng" => 3],
    ["Tên SP" => "Sản phẩm 3", "Giá bán" => 20, "Số lượng" => 7],
    ["Tên SP" => "Sản phẩm 4", "Giá bán" => 8, "Số lượng" => 2],
    ["Tên SP" => "Sản phẩm 5", "Giá bán" => 12, "Số lượng" => 4]
];
// Tính tổng số lượng các sản phẩm
$sum = 0;
foreach ($products as $product) {
    $sum += $product["Số lượng"];
}
// In kết quả
echo "Tổng số lượng các sản phẩm: " . $sum;
