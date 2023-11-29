<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    h1{
        text-align: center;
    }
</style>
<body>
    <h1>DANH SÁCH CHUYẾN BAY</h1>
<?php

$dataAir = [
    [
        'so_hieu_chuyen_bay' => 'AIR123',
        'noi_di' => 'Hà Nội',
        'noi_den' => 'Lào Cai',
        'tong_hanh_khach' => '200',
        'thoi_gian_di' => '2024-04-10 12:00:00',
        'thoi_gian_den' => '2024-04-10 15:00:00',
    ],
    [
        'so_hieu_chuyen_bay' => 'AIR456',
        'noi_di' => 'Đà Nẵng',
        'noi_den' => 'Hải phòng',
        'tong_hanh_khach' => '100',
        'thoi_gian_di' => '2023-12-03 12:00:00',
        'thoi_gian_den' => '2023-12-03 18:00:00',
    ],
    [
        'so_hieu_chuyen_bay' => 'AIR789',
        'noi_di' => 'Hà Nội',
        'noi_den' => 'Hải Phòng',
        'tong_hanh_khach' => '150',
        'thoi_gian_di' => '2023-22-07 19:00:00',
        'thoi_gian_den' => '2023-23-07 23:59:00',
    ],
    [
        'so_hieu_chuyen_bay' => 'AIR111',
        'noi_di' => 'Hà Nội',
        'noi_den' => 'TP. Hồ Chí Minh',
        'tong_hanh_khach' => '123',
        'thoi_gian_di' => '2023-11-07 12:00:00',
        'thoi_gian_den' => '2023-11-07 23:00:00',
    ],
    [
        'so_hieu_chuyen_bay' => 'AIR7222',
        'noi_di' => 'Bac Ninh',
        'noi_den' => 'Hai Duong',
        'tong_hanh_khach' => '70',
        'thoi_gian_di' => '2022-11-07 12:00:00',
        'thoi_gian_den' => '2022-11-07 21:00:00',
    ]
];


// Khởi tạo biến kiểm tra xem đã lọc chưa 
$filter = false;
// Khởi tạo mảng lưu air sau khi lọc
$arr_air = [];
// Lấy thời gian hiện tại
date_default_timezone_set('Asia/Ho_Chi_Minh');
$realTime = date("Y-d-m H:i:s");

// Viết function Để hiển thị ra trạng thái
function trangThai($realTime, $thoi_gian_di, $thoi_gian_den) {
    if ($realTime >= $thoi_gian_di && $realTime <= $thoi_gian_den ) {
        return "Đang bay";
    } elseif ($realTime < $thoi_gian_di) {
        return "Chưa khởi hành";
    } else {
        return "Đã hạ cánh";
    }
}

// Viết function Để lấy màu cho ô
function colorRow($realTime, $thoi_gian_di, $thoi_gian_den) {
    if ($realTime >= $thoi_gian_di && $realTime <= $thoi_gian_den ) {
        return "#00f6ff";
    } elseif ($realTime < $thoi_gian_di) {
        return "#a2df7f";
    } else {
        return "#df7fa3";
    }
}

// Kiểm tra xem người dùng đã nhập số hiệu chuyến bay hoặc khoảng thời gian đi/ngày đến hay chưa
if (isset($_POST['so_hieu_chuyen_bay']) || (isset($_POST['thoi_gian_di']) && isset($_POST['thoi_gian_den']))) {
    // Khởi tạo mảng rỗng để lưu trữ các chuyến bay phù hợp sau khi lọc
    $arr_air = [];

    foreach ($dataAir as $air) {
        // Khởi tạo biến $match với giá trị true, biến này sẽ được sử dụng để kiểm tra xem chuyến bay hiện tại có phù hợp với tiêu chí lọc hay không
        $match = true;
        // Lọc theo số hiệu chuyến bay nếu người dùng đã nhập số hiệu
        if (isset($_POST['so_hieu_chuyen_bay']) && $_POST['so_hieu_chuyen_bay'] !== '') {
            // Lấy số hiệu chuyến bay từ người dùng
            $so_hieu_chuyen_bay = $_POST['so_hieu_chuyen_bay'];
            // Kiểm tra xem số hiệu chuyến bay từ người dùng có xuất hiện trong chuỗi số hiệu chuyến bay của chuyến bay hiện tại hay không
            if (strpos($air['so_hieu_chuyen_bay'], $so_hieu_chuyen_bay) === false) {
                // Nếu không tìm thấy số hiệu chuyến bay trong chuyến bay hiện tại, gán biến $match thành false
                $match = false;
            }
        }

        // Lọc theo khoảng thời gian nếu người dùng đã nhập thời gian đi và ngày đến
        if (isset($_POST['thoi_gian_di']) && isset($_POST['thoi_gian_den']) && $_POST['thoi_gian_di'] !== '' && $_POST['thoi_gian_den'] !== '') {
            $thoi_gian_di = date_create($_POST['thoi_gian_di'])->format('Y-d-m H:i:s');
            $thoi_gian_den = date_create($_POST['thoi_gian_den'])->format('Y-d-m H:i:s');
            // Kiểm tra xem thời gian đi của chuyến bay hiện tại có nằm trong khoảng thời gian mà người dùng nhập hay không
            if (!($air['thoi_gian_di'] >= $thoi_gian_di && $air['thoi_gian_di'] <= $thoi_gian_den)) {
                // Nếu không nằm trong khoảng thời gian, gán biến $match thành false
                $match = false;
            }
        }

        // Nếu chuyến bay hiện tại phù hợp với các tiêu chí lọc, thêm chuyến bay này vào mảng $arr_air
        if ($match) {
            $arr_air[] = $air;
        }
    }
    // Đánh dấu rằng đã lọc dữ liệu thành công
    $filter = !empty($arr_air);
}

?>
<form action="" method="post">
    <label for="so_hieu_chuyen_bay">Số hiệu chuyến bay</label>
    <input type="text" name ="so_hieu_chuyen_bay">

    <label for="thoi_gian_di">Thời gian đi</label>
    <input type="datetime-local" name ="thoi_gian_di">

    <label for="thoi_gian_den">Thời gian đến</label>
    <input type="datetime-local" name ="thoi_gian_den">

    <button type = "submit">Lọc</button>
</form>

<?php if ($filter): ?>
    <table class="table table-bordered m-table d-sm-table m-table–head-bg-primary">
        <thead>
            <tr>
                <th>Số hiệu</th>
                <th>Nơi đi</th>
                <th>Nơi đến</th>
                <th>Số khách</th>
                <th>Thời gian đi</th>
                <th>Thời gian đến</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arr_air as $air): 
                $so_hieu_chuyen_bay = $air['so_hieu_chuyen_bay'];    
                $noi_di = $air['noi_di'];    
                $noi_den = $air['noi_den'];    
                $tong_hanh_khach = $air['tong_hanh_khach'];    
                $thoi_gian_di = $air['thoi_gian_di'];    
                $thoi_gian_den = $air['thoi_gian_den'];  
            ?>
            <tr style = "background-color: <?php echo colorRow($realTime, $thoi_gian_di, $thoi_gian_den) ?>;">
                <td><?php echo $so_hieu_chuyen_bay ?></td>
                <td><?php echo $noi_di ?></td>
                <td><?php echo $noi_den ?></td>
                <td><?php echo $tong_hanh_khach ?></td>
                <td><?php echo $thoi_gian_di ?></td>
                <td><?php echo $thoi_gian_den ?></td>
                <td><?php echo trangThai($realTime, $thoi_gian_di, $thoi_gian_den)?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else: ?>
    <table class="table table-bordered m-table d-sm-table m-table–head-bg-primary">
        <thead>
            <tr>
                <th>Số hiệu</th>
                <th>Nơi đi</th>
                <th>Nơi đến</th>
                <th>Số khách</th>
                <th>Thời gian đi</th>
                <th>Thời gian đến</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($dataAir as $air): 
                $so_hieu_chuyen_bay = $air['so_hieu_chuyen_bay'];   
                $noi_di = $air['noi_di'];    
                $noi_den = $air['noi_den'];    
                $tong_hanh_khach = $air['tong_hanh_khach'];    
                $thoi_gian_di = $air['thoi_gian_di'];    
                $thoi_gian_den = $air['thoi_gian_den'];    
            ?>
            <tr style = "background-color: <?php echo colorRow($realTime, $thoi_gian_di, $thoi_gian_den) ?>;">
                <td><?php echo $so_hieu_chuyen_bay ?></td>
                <td><?php echo $noi_di ?></td>
                <td><?php echo $noi_den ?></td>
                <td><?php echo $tong_hanh_khach ?></td>
                <td><?php echo $thoi_gian_di ?></td>
                <td><?php echo $thoi_gian_den ?></td>
                <td><?php echo trangThai($realTime, $thoi_gian_di, $thoi_gian_den)?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>
</body>
</html>

