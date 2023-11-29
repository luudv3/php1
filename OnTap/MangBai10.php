<?php
// Tạo mảng chứa các số nguyên
$numbers = array(2, 5, 8, 11, 6, 9);

// Tính tổng của hai phần tử trong mảng sao cho tổng bằng một số nguyên được chỉ định
function findTwoNumbersWithSum($arr, $targetSum) {
    $visited = array(); // Mảng bổ sung để lưu trữ các phần tử đã duyệt qua

    foreach ($arr as $number) {
        $complement = $targetSum - $number;

        if (in_array($complement, $visited)) {
            return array($complement, $number);
        }

        $visited[] = $number; // Lưu trữ phần tử vào mảng bổ sung
    }

    return null; // Trả về null nếu không tìm thấy hai phần tử nào có tổng bằng $targetSum
}

// Sử dụng hàm findTwoNumbersWithSum để tìm hai phần tử có tổng bằng 14 (ví dụ)
$targetSum = 14;
$foundNumbers = findTwoNumbersWithSum($numbers, $targetSum);

// Hiển thị kết quả
if ($foundNumbers) {
    echo "Hai phần tử có tổng bằng " . $targetSum . " là: " . $foundNumbers[0] . " và " . $foundNumbers[1];
} else {
    echo "Không tìm thấy hai phần tử có tổng bằng " . $targetSum;
}
?>
