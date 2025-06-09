<?php
$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset('utf8');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy danh sách người dùng
$sql_users = "SELECT uid, username, email FROM user";
$result_users = $conn->query($sql_users);

// Lấy danh sách lịch đặt khám
$sql_appointments = "SELECT id, hoten, ngay, gio FROM lichkham";
$result_appointments = $conn->query($sql_appointments);
?>
<style>
    
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1100px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(44,62,80,0.08);
            padding: 32px 40px 40px 40px;
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
        h1 {
            color: #2980b9;
            text-align: center;
            margin-bottom: 32px;
            letter-spacing: 1px;
        }
        h2 {
            color: #2c3e50;
            margin-top: 32px;
            margin-bottom: 16px;
            border-left: 5px solid #3498db;
            padding-left: 12px;
            font-size: 1.3em;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 32px;
            background: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(44,62,80,0.04);
        }
        th, td {
            border: none;
            padding: 12px 14px;
            text-align: left;
        }
        th {
            background: #3498db;
            color: #fff;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        tr:nth-child(even) {
            background: #eaf3fa;
        }
        tr:hover {
            background: #d6eaf8;
            transition: background 0.2s;
        }
        .btn-xuly {
            background: linear-gradient(90deg, #3498db 60%, #2980b9 100%);
            color: #fff;
            padding: 7px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(52,152,219,0.12);
            transition: background 0.2s, box-shadow 0.2s;
        }
        .btn-xuly:hover {
            background: linear-gradient(90deg, #2980b9 60%, #3498db 100%);
            box-shadow: 0 4px 12px rgba(52,152,219,0.18);
        }
        @media (max-width: 700px) {
            .container { padding: 12px; }
            table, th, td { font-size: 14px; }
            h1 { font-size: 1.3em; }
        }
 
</style>
<a href="admin_index.php" class="back-home" style="padding-top: 10px">← Quay về trang chủ</a>
<h2>Danh sách lịch đặt khám</h2>
    <table style="font-size: 14px; width: 95%; margin: 0 auto;">
        <tr>
        <th>ID</th>
        <th>Tên bệnh nhân</th>
        <th>Ngày đặt</th>
        <th>Giờ</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
        </tr>
        <?php
        // Lấy lại danh sách lịch đặt khám với trạng thái
        $sql_appointments = "SELECT id, hoten, ngay, gio, trangthai FROM lichkham";
        $result_appointments = $conn->query($sql_appointments);
        ?>
        <?php if ($result_appointments && $result_appointments->num_rows > 0): ?>
        <?php while($row = $result_appointments->fetch_assoc()): ?>
            <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['hoten']); ?></td>
            <td><?php echo htmlspecialchars($row['ngay']); ?></td>
            <td><?php echo htmlspecialchars($row['gio']); ?></td>
            <td>
                <?php
                if ($row['trangthai'] == 'xacnhan') {
                    echo '<span style="color: #27ae60; font-weight: bold;">Đã xác nhận</span>';
                } elseif ($row['trangthai'] == 'hoanthanh') {
                    echo '<span style="color: #2980b9; font-weight: bold;">Hoàn thành</span>';
                } else {
                    echo '<span style="color: #e67e22; font-weight: bold;">Chờ xử lý</span>';
                }
                ?>
            </td>
            <td>
                <?php if ($row['trangthai'] == 'hoanthanh'): ?>
                <span style="color: #888;">Đã hoàn thành</span>
                <?php elseif ($row['trangthai'] == 'xacnhan'): ?>
                <a class="btn-xuly" href="xulytrangthai.php?id=<?php echo $row['id']; ?>&action=hoanthanh">Hoàn thành</a>
                <?php else: ?>
                <a class="btn-xuly" href="xulytrangthai.php?id=<?php echo $row['id']; ?>&action=xacnhan">Xác nhận</a>
                <?php endif; ?>
            </td>
            </tr>
        <?php endwhile; ?>
        <?php else: ?>
        <tr><td colspan="6">Không có lịch đặt khám nào.</td></tr>
        <?php endif; ?>
    </table>
