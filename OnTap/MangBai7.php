<?php
// Tạo mảng chứa thông tin học sinh
$sinhVien = [
    ["ten" => "LuuDV3", "diem_toan" => 85, "diem_van" => 90],
    ["ten" => "LuuDV4", "diem_toan" => 78, "diem_van" => 92],
    ["ten" => "LuuDV5", "diem_toan" => 92, "diem_van" => 88],
    ["ten" => "LuuDV6", "diem_toan" => 70, "diem_van" => 75],
    ["ten" => "LuuDV7", "diem_toan" => 95, "diem_van" => 98]
];

// Tính điểm trung bình và hiển thị thông tin lên màn hình
foreach ($sinhVien as $sinhViens) {
    $ten = $sinhViens["ten"];
    $diem_toan = $sinhViens["diem_toan"];
    $diem_van = $sinhViens["diem_van"];

    // Tính điểm trung bình
    $diemTB = ($diem_van + $diem_toan) / 2;

    // Hiển thị thông tin lên màn hình
    echo "Học sinh: " . $ten . "<br>";
    echo "Điểm toán: " . $diem_toan . "<br>";
    echo "Điểm văn: " . $diem_van . "<br>";
    echo "Điểm trung bình: " . $diemTB . "<br>";
}
?>
