<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lịch Khám Đã Đặt</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { width: 80%; margin: 40px auto; background: #fff; padding: 20px; border-radius: 8px; }
        h2 { text-align: center; color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ccc; text-align: center; }
        th { background: #3498db; color: #fff; }
        tr:nth-child(even) { background: #f9f9f9; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lịch Khám Đã Đặt</h2>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ Tên Bệnh Nhân</th>
                    <th>Ngày Khám</th>
                    <th>Giờ Khám</th>
                    <th>Bác Sĩ</th>
                    <th>Chuyên Khoa</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
          <tbody>
<?php
// Kết nối database
$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset("utf8");

// Lấy dữ liệu lịch khám, join với bảng bác sĩ để lấy tên bác sĩ
$sql = "SELECT l.id, l.hoten, l.ngay AS ngaykham, l.gio AS giokham, d.Ten AS bacsi, l.chuyenkhoa
        FROM lichkham l
        LEFT JOIN doctors d ON l.bacsi_id = d.id
        ORDER BY l.ngay DESC, l.gio DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $stt = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$stt}</td>
            <td>{$row['hoten']}</td>
            <td>{$row['ngaykham']}</td>
            <td>{$row['giokham']}</td>
            <td>{$row['bacsi']}</td>
            <td>{$row['chuyenkhoa']}</td>
            <td>Chờ xác nhận</td>
        </tr>";
        $stt++;
    }
} else {
    echo '<tr><td colspan="7">Chưa có lịch khám nào được đặt.</td></tr>';
}
$conn->close();
?>
</tbody> 
        </table>
    </div>
</body>
</html>