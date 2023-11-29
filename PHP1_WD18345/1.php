<!DOCTYPE html>
<html>
<head>
    <title>Kết quả tìm kiếm chuyến bay</title>
</head>
<body>
    <h1>Kết quả tìm kiếm chuyến bay</h1>
    <table border="1">
        <tr>
            <th>Số hiệu chuyến bay</th>
            <th>Nơi đi</th>
            <th>Nơi đến</th>
            <th>Tổng hành khách</th>
            <th>Thời gian đi</th>
            <th>Thời gian đến</th>
            <th>Trạng thái</th>
        </tr>
        <?php
        // Mảng giả lập thông tin danh sách các chuyến bay
        $flights = array(
            array('so_hieu_chuyen_bay' => 'VN123', 'noi_di' => 'Hanoi', 'noi_den' => 'Ho Chi Minh City', 'tong_hanh_khach' => 150, 'thoi_gian_di' => '2023-07-20 08:00:00', 'thoi_gian_den' => '2023-07-20 10:00:00'),
            array('so_hieu_chuyen_bay' => 'VN456', 'noi_di' => 'Ho Chi Minh City', 'noi_den' => 'Da Nang', 'tong_hanh_khach' => 120, 'thoi_gian_di' => '2023-07-21 09:30:00', 'thoi_gian_den' => '2023-07-21 11:30:00'),
            array('so_hieu_chuyen_bay' => 'VN789', 'noi_di' => 'Da Nang', 'noi_den' => 'Hanoi', 'tong_hanh_khach' => 100, 'thoi_gian_di' => '2023-07-22 12:15:00', 'thoi_gian_den' => '2023-07-22 14:15:00')
        );

        if (isset($_POST['search'])) {
            $so_hieu_chuyen_bay = $_POST['so_hieu_chuyen_bay'];
            $thoi_gian_di = $_POST['thoi_gian_di'];
            $thoi_gian_den = $_POST['thoi_gian_den'];

            foreach ($chuyen_bay as $chuyen_bays) {
                $thoi_gian_di = new DateTime($chuyen_bays['thoi_gian_di']);
                $thoi_gian_den = new DateTime($chuyen_bays['thoi_gian_den']);
                $thoi_gian_khoi_hanh = new DateTime($thoi_gian_di);
                $thoi_gian_den_user = new DateTime($thoi_gian_den);

                if ($user_arrival_datetime < $departure_datetime) {
                    $status = 'Chưa bay';
                    $status_color = 'green';
                } elseif ($user_departure_datetime > $arrival_datetime) {
                    $status = 'Đã bay';
                    $status_color = 'red';
                } else {
                    $status = 'Đang bay';
                    $status_color = 'yellow';
                }

                echo "<tr>";
                echo "<td>{$flight['so_hieu_chuyen_bay']}</td>";
                echo "<td>{$flight['noi_di']}</td>";
                echo "<td>{$flight['noi_den']}</td>";
                echo "<td>{$flight['tong_hanh_khach']}</td>";
                echo "<td>{$flight['thoi_gian_di']}</td>";
                echo "<td>{$flight['thoi_gian_den']}</td>";
                echo "<td style='background-color: {$status_color};'>{$status}</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
