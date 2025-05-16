<?php
session_start(); // Bắt đầu session

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    echo '<p>Bạn cần đăng nhập để xem lịch khám.</p>';
    exit;
}

// Kết nối database
$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset("utf8");

// Lấy ID người dùng từ session
$user_id = $_SESSION['username'];

// Lấy dữ liệu lịch khám của người dùng hiện tại
$sql = "SELECT l.id, l.hoten, l.ngay AS ngaykham, l.gio AS giokham, d.Ten AS bacsi, l.chuyenkhoa
        FROM lichkham l
        LEFT JOIN doctors d ON l.bacsi_id = d.id
        WHERE l.id = ?
        ORDER BY l.ngay DESC, l.gio DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Khám</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lịch Khám Của Bạn</h1>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Ngày Khám</th>
                <th>Giờ Khám</th>
                <th>Bác Sĩ</th>
                <th>Chuyên Khoa</th>
                <th>Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
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
            $stmt->close();
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
