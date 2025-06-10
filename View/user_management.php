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

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
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
</head>
<body>
    <div class="container">
        <a href="admin_index.php" class="back-home">← Quay về trang chủ</a>
        <h1>Quản trị viên - Trang tổng quan</h1>

        <?php
        // Xử lý xóa người dùng
        if (isset($_GET['delete_uid'])) {
            $delete_uid = intval($_GET['delete_uid']);
            if ($delete_uid > 0) {
                $conn->query("DELETE FROM user WHERE uid = $delete_uid");
                // Sau khi xóa, load lại trang để cập nhật danh sách
                header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
                exit;
            }
        }

        // Xử lý phân quyền (ví dụ: cập nhật cột 'role')
        if (isset($_POST['set_role_uid']) && isset($_POST['role'])) {
            $set_role_uid = intval($_POST['set_role_uid']);
            $role = $conn->real_escape_string($_POST['role']);
            $conn->query("UPDATE user SET role = '$role' WHERE uid = $set_role_uid");
            header("Location: " . $_SERVER["REQUEST_URI"]);
            exit;
        }
        ?>

        <h2>Danh sách người dùng</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Phân quyền</th>
                <th>Hành động</th>
            </tr>
            <?php
            // Lấy lại danh sách người dùng sau khi thao tác
            $result_users = $conn->query("SELECT uid, username, email, role FROM user");
            ?>
            <?php if ($result_users && $result_users->num_rows > 0): ?>
                <?php while($row = $result_users->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['uid']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="set_role_uid" value="<?php echo $row['uid']; ?>">
                                <select name="role">
                                    <option value="user" <?php if($row['role']=='user') echo 'selected'; ?>>User</option>
                                    <option value="admin" <?php if($row['role']=='admin') echo 'selected'; ?>>Admin</option>
                                </select>
                                <button type="submit" class="btn-xuly">Lưu</button>
                            </form>
                        </td>
                        <td>
                            <a href="?delete_uid=<?php echo $row['uid']; ?>" class="btn-xuly" onclick="return confirm('Bạn có chắc muốn xóa người dùng này?');">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">Không có người dùng nào.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
<?php
$conn->close();
?>
