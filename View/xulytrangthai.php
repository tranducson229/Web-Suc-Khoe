<?php
$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset('utf8');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];

    // Kiểm tra và cập nhật trạng thái tương ứng
    if ($action == 'xacnhan') {
        $update = "UPDATE lichkham SET trangthai = 'xacnhan' WHERE id = $id";
    } elseif ($action == 'hoanthanh') {
        $update = "UPDATE lichkham SET trangthai = 'hoanthanh' WHERE id = $id";
    }

    if (isset($update)) {
        if ($conn->query($update) === TRUE) {
            // Sau khi cập nhật thành công, quay lại dashboard
            header("Location: appointment_management.php");
            exit();
        } else {
            echo "Lỗi cập nhật: " . $conn->error;
        }
    }
} else {
    echo "Thiếu thông tin.";
}

$conn->close();
?>