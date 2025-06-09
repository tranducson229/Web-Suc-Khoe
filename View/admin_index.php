<?php
$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset('utf8');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
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
        .dashboard-options {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 40px;
        }
        .dashboard-option {
            flex: 1;
            text-align: center;
            background: #f9f9f9;
            border-radius: 12px;
            padding: 40px 20px;
            box-shadow: 0 4px 12px rgba(44,62,80,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .dashboard-option:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(44,62,80,0.15);
        }
        .dashboard-option a {
            text-decoration: none;
            color: #3498db;
            font-size: 1.2em;
            font-weight: bold;
        }
        .dashboard-option a:hover {
            color: #2980b9;
        }
        .dashboard-option h2 {
            margin-bottom: 16px;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h1>Quản trị viên - Trang tổng quan</h1>

        <div class="dashboard-options">
            <div class="dashboard-option">
                <h2>Quản lý người dùng</h2>
                <a href="user_management.php">Đi đến quản lý người dùng</a>
            </div>
            <div class="dashboard-option">
                <h2>Quản lý lịch khám</h2>
                <a href="appointment_management.php">Đi đến quản lý lịch khám</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
