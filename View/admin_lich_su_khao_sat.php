<?php
session_start();
// Giả sử quyền admin được đánh dấu trong session
$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset("utf8");
// Lấy lịch sử toàn bộ khảo sát
$sql = "
    SELECT ks.id, u.username, ks.tong_diem, ks.danh_gia, ks.thoigian
    FROM khao_sat_tam_ly ks
    JOIN user u ON ks.user_id = u.uid
    ORDER BY ks.thoigian DESC
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý khảo sát người dùng</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        h2 {
            margin-bottom: 20px;
        }
         .back-home {
            display: inline-block;
            margin-bottom: 24px;
            background: linear-gradient(90deg, #27ae60 60%, #2ecc71 100%);
            color: #fff;
            padding: 8px 22px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(39,174,96,0.12);
            transition: background 0.2s, box-shadow 0.2s;
        }
        .back-home:hover {
            background: linear-gradient(90deg, #229954 60%, #27ae60 100%);
            box-shadow: 0 4px 12px rgba(39,174,96,0.18);
        }
    </style>
</head>
<body>
    <a href="admin_index.php" class="back-home" style="padding-top: 10px">← Quay về trang chủ</a>
    <h2>Lịch sử khảo sát của người dùng</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Tổng điểm</th>
                <th>Nhận định</th>
                <th>Thời gian khảo sát</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo $row['tong_diem']; ?></td>
                    <td><?php echo htmlspecialchars($row['danh_gia']); ?></td>
                    <td><?php echo $row['thoigian']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
