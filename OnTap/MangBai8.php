<?php
// Tạo mảng chứa các số nguyên
$numbers = array(2, 5, 7, 9, 12, 15);

// Kiểm tra xem mảng có phải là dãy số tăng dần hay không
function isAscendingArray($arr) {
    $length = count($arr);
    for ($i = 1; $i < $length; $i++) {
        if ($arr[$i] < $arr[$i - 1]) {
            return false;
        }
    }
    return true;
}

// Kiểm tra mảng $numbers có phải là dãy số tăng dần hay không
if (isAscendingArray($numbers)) {
    echo "Mảng là một dãy số tăng dần.";
} else {
    echo "Mảng không phải là một dãy số tăng dần.";
}
?>
